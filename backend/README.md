# Documentação para Desenvolvedores

## Rodar servidor backend
### LINUX
```bash
git fetch
git checkout development/back-end
git pull origin development/back-end
python3 -m venv .venv
source .venv/bin/activate
pip install -r requirements.txt
python3 manage.py runserver
```

### WINDOWS
```bash
git fetch
git checkout development/back-end
git pull origin development/back-end
python -m venv .venv
.\.venv\Scripts\Activate.ps1
pip install -r requirements.txt
python manage.py runserver
```

# ENDPOINTS
### | Autenticação do usuário |

⚠️ **ATENÇÃO:**
   - **O usuário deve existir!**

#### | 1. Gerar token JWT |

**Requisição / Request:**
```bash
curl -X POST http://127.0.0.1:8000/v1/token/ \
     -H "Content-Type: application/json" \
     -d '{
          "username": "teste",
          "password": "teste"
         }'
```
**Resposta / Saída / Output:**
```json
{
   "access":"eyJsInR...",
   "refresh":"eyJhba6...",
   "user_id":3,
   "username":"teste",
   "is_staff":false
}
``` 
#### | 2. Renegerar token JWT |

**Requisição / Request:**
```bash
curl -X POST http://127.0.0.1:8000/v1/token/refresh/ \
     -H "Content-Type: application/json" \
     -d '{
          "refresh": "eyJhba6"
         }'
```
**Resposta / Saída / Output:**
```json
{
   "access":"eyJsInR..."
}
```




