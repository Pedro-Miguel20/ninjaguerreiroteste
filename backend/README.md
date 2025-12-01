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
python manage.py migrate
python3 manage.py runserver
```

### WINDOWS
```bash
git fetch
git checkout development/back-end
git pull origin development/back-end
python -m venv .venv
.\.venv\Scripts\Activate.ps1
python.exe -m pip install --upgrade pip
pip install -r requirements.txt
python manage.py migrate
python manage.py runserver
```

## Rodar servidor frontend
### WINDOWS
```bash
scoop install main/pnpm
pnpm install
pnpm dev
```

# ENDPOINTS
### | Autenticação do usuário |

⚠️ **ATENÇÃO:**
   - **O usuário deve existir!**

#### | 1. Gerar token JWT |

**Requisição / Request:** (Linux)
```bash
curl -X POST http://127.0.0.1:8000/v1/token/ \
     -H "Content-Type: application/json" \
     -d '{
          "username": "teste",
          "password": "teste"
         }'
```
**Requisição / Request:** (Windows)
```bash
Invoke-WebRequest -Uri "http://127.0.0.1:8000/v1/token/" -Method POST -Headers @{
    "Content-Type" = "application/json"
} -Body '{"username":"teste","password":"teste"}'
```

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

**Requisição / Request:** (Linux)
```bash
curl -X POST http://127.0.0.1:8000/v1/token/refresh/ \
     -H "Content-Type: application/json" \
     -d '{
          "refresh": "eyJhba6"
         }'
```
**Requisição / Request:** (Windows)
```bash
Invoke-RestMethod -Uri "http://127.0.0.1:8000/v1/token/refresh/" `
  -Method POST `
  -Headers @{
      "Content-Type" = "application/json"
  } `
  -Body '{
      "refresh": "eyJhba6"
  }'
```

**Resposta / Saída / Output:**
```json
{
   "access":"eyJsInR..."
}
```




