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
Requisição / Request:
```bash
GET /login
```
Resposta / Saída / Output:
```bash

```

## Rodar servidor frontend
### WINDOWS
```bash
scoop install main/pnpm
pnpm install
pnpm dev
```
