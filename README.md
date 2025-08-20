# create-ad-mercadolivre

## Sobre:
Script para criar um anúncio no Mercado Livre

## Como rodar

1) Rode ``git clone https://github.com/ogabrielgodoy/create-ad-mercadolivre``

2) Rode ``composer install``

3) Duplique o arquivo ".env.example", e ronomeie para ".env"

4) Adicione o "Access_token" no arquivo .env

5) Rode ``php app.php`` para criar um anúncio

obs: Dados do anúncio para alterar estão no arquivo 'app.php'

## To-do list

[x] Publicar anúncio  
[x] Consultar uma categoria e descobrir quais são os campos obrigatórios e incluir no payload de publição de anúncios  
[] Usar AI para gerar informação valida para preencher os campos obrigatórios