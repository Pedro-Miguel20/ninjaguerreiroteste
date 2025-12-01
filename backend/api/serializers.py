from django.contrib.auth.models import User, Group
from rest_framework import serializers

class UserSerializer(serializers.ModelSerializer):
    password = serializers.CharField(write_only=True)

    class Meta:
        model = User
        fields = ["id", "username", "password", "groups"]

    def create(self, validated_data):
        password = validated_data.pop("password")
        
        user = User.objects.create(**validated_data)
        user.set_password(password)
        user.save()

        return user
        
        
class GroupSerializer(serializers.ModelSerializer):
    class Meta:
        model = Group
        fields = ["id", "name"]