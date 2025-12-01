<br />
<div align="center">
  <a href="https://github.com/othneildrew/Best-README-Template">
    <img src="https://private-user-images.githubusercontent.com/74038190/238201075-34376b0e-4ae2-4278-9d3d-82e8016a87d6.gif?jwt=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJnaXRodWIuY29tIiwiYXVkIjoicmF3LmdpdGh1YnVzZXJjb250ZW50LmNvbSIsImtleSI6ImtleTUiLCJleHAiOjE3NjQyODg0NDIsIm5iZiI6MTc2NDI4ODE0MiwicGF0aCI6Ii83NDAzODE5MC8yMzgyMDEwNzUtMzQzNzZiMGUtNGFlMi00Mjc4LTlkM2QtODJlODAxNmE4N2Q2LmdpZj9YLUFtei1BbGdvcml0aG09QVdTNC1ITUFDLVNIQTI1NiZYLUFtei1DcmVkZW50aWFsPUFLSUFWQ09EWUxTQTUzUFFLNFpBJTJGMjAyNTExMjglMkZ1cy1lYXN0LTElMkZzMyUyRmF3czRfcmVxdWVzdCZYLUFtei1EYXRlPTIwMjUxMTI4VDAwMDIyMlomWC1BbXotRXhwaXJlcz0zMDAmWC1BbXotU2lnbmF0dXJlPTZkN2FhZGUxMzIyMWY0ZjlhMzhkMjEzMjFhNjdjZTgyY2M1YzY3YjU4ZjhjZTYxYzZjODNkOWY5NWNlNGFmZmQmWC1BbXotU2lnbmVkSGVhZGVycz1ob3N0In0.sTR4-VfYPmamCfNpbo-rf9cvo-eYuVE6LccKQgqBkMs" alt="Logo" width="80" height="80">
  </a>

  <h2 align="center">WarriorNinja</h2>
  <p align="center">Um ecossistema digital com soluções modulares organizadas por permissões.</p>
</div>

<details>
  <summary>Índice</summary>
  <ol>
    <li><a href="#sobre-o-projeto">Sobre o projeto</a></li>
    <li><a href="#tecnologias">Tecnologias</a></li>
    <li><a href="#como-executar">Como executar</a>
      <ul>
        <li><a href="#pré-requisitos">Pré-requisitos</a></li>
        <li><a href="#instalação">Instalação</a></li>
      </ul>
    </li>
    <li><a href="#uso">Uso</a></li>
    <li><a href="#roadmap-do-projeto">Roadmap do projeto</a></li>
  </ol>
</details>


<!--## Sobre o projeto-->

<!--[PENDENTE]-->


### Tecnologias

[![Next][Next.js]][Next-url]
</br>
[![Django][Django]][Django-url]



## Como executar

### Pré-requisitos

- Python 3.12+ instalado
- `pip` (gerenciador de pacotes)

### Instalação 

Exemplo Windows (Powershel):
```powershell
cd backend
python -m venv .venv
.\.venv\Scripts\Activate.ps1
pip install -r requirements.txt
python manage.py migrate
python manage.py runserver
```

Exemplo Linux (bash):

```bash
cd backend
python3 -m venv .venv
source .venv/bin/activate
pip install -r requirements.txt
python3 manage.py migrate
python3 manage.py runserver
```


<!--## Uso-->

<!--[PENDENTE]-->

## Roadmap do projeto

- [x] Estrutura básica do projeto
- [ ] Autententicação via JWT
- [ ] Implementar views e rotas para autenticação
- [ ] Documentar endpoints com djangorestframework
- [ ] Criar frontend com next.js funcional que consuma a API


<!--[ADICIONAR MAIS TÓPICOS CONFORE O DESENVOLVIMENTO]-->

<!-- MARKDOWN LINKS & IMAGES -->
[Next.js]: https://img.shields.io/badge/next.js-000000?style=for-the-badge&logo=nextdotjs&logoColor=white
[Next-url]: https://nextjs.org/
[Django]: https://img.shields.io/badge/django-003700?style=for-the-badge&logo=django&logoColor=white
[Django-url]: https://www.djangoproject.com/