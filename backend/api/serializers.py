from django.contrib.auth.models import User, Group
from rest_framework import serializers

class UserSerializer(serializers.ModelSerializer):
    groups = serializers.PrimaryKeyRelatedField(queryset=Group.objects.all(), many=True)

class UserSerializer(serializers.ModelSerializer):
    password = serializers.CharField(write_only=True)
    groups = serializers.PrimaryKeyRelatedField(queryset=Group.objects.all(), many=True)

    class Meta:
        model = User
        fields = ["id", "username", "password", "groups", "is_active"]

    def create(self, validated_data):
        # Garantindo que is_active será False ao criar o usuário
        validated_data["is_active"] = False  # Definindo o usuário como inativo

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