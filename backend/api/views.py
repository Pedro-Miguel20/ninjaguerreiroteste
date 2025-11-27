from django.contrib.auth import authenticate
from rest_framework import status
from rest_framework.response import Response
from rest_framework.views import APIView
from rest_framework_simplejwt.tokens import AccessToken
from rest_framework_simplejwt.tokens import RefreshToken
from rest_framework_simplejwt.views import TokenObtainPairView, TokenRefreshView
from django.contrib.auth.models import User
from rest_framework.permissions import AllowAny

# Função para gerar tokens (pode ficar em utils.py, conforme sugerido anteriormente)
def get_tokens_for_user(user: User):
    refresh = RefreshToken.for_user(user)

    refresh.payload['user_id'] = user.id
    refresh.payload['username'] = user.username
    refresh.payload['is_staff'] = user.is_staff

    access_token = refresh.access_token

    return access_token, refresh


# View para login e geração de tokens
class CustomTokenObtainPairView(TokenObtainPairView):
    permission_classes = [AllowAny]  # Permite acesso público ao login

    def post(self, request, *args, **kwargs):
        # Pegando username e password da requisição
        username = request.data.get('username')
        password = request.data.get('password')

        # Autenticando o usuário
        user = authenticate(username=username, password=password)

        if user is not None:
            # Gerando os tokens para o usuário autenticado
            access_token, refresh_token = get_tokens_for_user(user)

            # Retornando o access token
            return Response({
                'access': str(access_token),
                'refresh': str(refresh_token),
                'user_id': user.id,
                'username': user.username,
                'is_staff': user.is_staff 
            }, status=status.HTTP_200_OK)

        return Response({
            'detail': 'Credenciais inválidas',
        }, status=status.HTTP_401_UNAUTHORIZED)


# View para o refresh token (já existente no DRF)
class CustomTokenRefreshView(TokenRefreshView):
    pass
    