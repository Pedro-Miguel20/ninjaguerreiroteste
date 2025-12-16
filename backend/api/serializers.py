from django.contrib.auth.models import User, Group
from rest_framework import serializers
from django.core.exceptions import ValidationError
import re

class UserSerializer(serializers.ModelSerializer):
    password = serializers.CharField(write_only=True, required=True)
    groups = serializers.PrimaryKeyRelatedField(queryset=Group.objects.all(), many=True)

    class Meta:
        model = User
        fields = ["id", "username", "password", "groups", "is_active"]
        
    # Validação do nome de usuário
    def validate_username(self, value):
        # Validar se o nome de usuário tem pelo menos 3 caracteres
        if len(value) < 5:
            raise serializers.ValidationError("The username must be at least 5 characters long.")
        
        # Validar se o nome de usuário já existe
        if User.objects.filter(username=value).exists():
            raise serializers.ValidationError("This username is already in use.")
        
        return value

    # Validação da senha
    def validate_password(self, value):
        if len(value) < 8:
            raise serializers.ValidationError("The password must be at least 8 characters long.")

        # Validar se a senha contém pelo menos um número
        if not re.search(r"\d", value):
            raise serializers.ValidationError("The password must contain at least one number.")

        # Validar se a senha contém pelo menos um caractere especial
        if not re.search(r"[!@#$%^&*(),.?\":{}|<>]", value):
            raise serializers.ValidationError("The password must contain at least one special character (!@#$%^&*).")
        
        return value

    def create(self, validated_data):
        # Garantindo que is_active será False ao criar o usuário
        validated_data["is_active"] = False  # Definindo o usuário como inativo ao ser criado
        
        # Extraindo os grupos do validated_data
        groups_data = validated_data.pop("groups", [])

        # Criando o usuário
        user = User.objects.create(**validated_data)

        # Definindo a senha
        password = validated_data.pop("password")
        user.set_password(password)
        user.save()

        # Associando os grupos
        user.groups.set(groups_data)

        return user

class GroupSerializer(serializers.ModelSerializer):
    class Meta:
        model = Group
        fields = ["id", "name"]

