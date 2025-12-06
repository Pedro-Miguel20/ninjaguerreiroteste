
FROM python:alpine

ENV LANG C.UTF-8
ENV LC_ALL C.UTF-8

WORKDIR /app/backend

COPY ./ /app/backend/  

RUN mv .env.example .env

RUN pip install -r /app/backend/requirements.txt

CMD [ "python", "manage.py", "runserver", "0.0.0.0:8000" ]