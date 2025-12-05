from django.contrib.auth.models import User, Group
from rest_framework import permissions, viewsets
from rest_framework.response import Response
from rest_framework.views import APIView
from rest_framework import status

from api.serializers import UserSerializer, GroupSerializer

class RegisterAPIView(APIView):
    permission_classes = [permissions.AllowAny]  # Permite que qualquer um faça o registro

    def post(self, request, *args, **kwargs):
        # Passando os dados recebidos para o serializer
        serializer = UserSerializer(data=request.data)

        if serializer.is_valid():  # Verificando se os dados são válidos
            serializer.save()  # Cria o usuário e associa os grupos
            return Response(serializer.data, status=status.HTTP_201_CREATED)  # Retorna os dados do usuário com status 201 (criado)
        
        # Se os dados não forem válidos, retornamos os erros com status 400 (bad request)
        return Response(serializer.errors, status=status.HTTP_400_BAD_REQUEST)


class UserViewSet(viewsets.ModelViewSet):
    queryset = User.objects.all().order_by("-date_joined")
    serializer_class = UserSerializer
    permission_classes = [permissions.IsAuthenticated]
    
    
class GroupViewSet(viewsets.ModelViewSet):
    queryset = Group.objects.all().order_by("name")
    serializer_class = GroupSerializer
    def get_permissions(self):
        if self.action in ['list', 'retrieve']:  # Ações de leitura
            self.permission_classes = [permissions.AllowAny]  # Leitura pública
        else:  # Para criar, atualizar ou excluir
            self.permission_classes = [permissions.IsAdminUser]  # Apenas administradores ou usuários com permissão de staff
        return super().get_permissions()
