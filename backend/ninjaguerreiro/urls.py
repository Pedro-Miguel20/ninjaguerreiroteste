from django.urls import include, path
from rest_framework import routers
from rest_framework_simplejwt.views import TokenObtainPairView, TokenRefreshView
from api.views import RegisterAPIView
from api import views


router = routers.DefaultRouter()
router.register(r'users', views.UserViewSet)
router.register(r'groups', views.GroupViewSet)

urlpatterns = [
    path('v1/', include(router.urls)),
    
    
    path('v1/auth/register/', RegisterAPIView.as_view()),
    
    
    path('v1/auth/token/', TokenObtainPairView.as_view(), name='token_obtain_pair'), 
    path('v1/auth/token/refresh/', TokenRefreshView.as_view(), name='token_refresh'),
    
    
    # path('', include(router.urls)),
    # path('api-auth/', include('rest_framework.urls', namespace='rest_framework')),
    # path('admin/', admin.site.urls),
]
