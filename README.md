# Sistema CDD

A tabela de classificação adotada na biblioteca da FFLCH é a CDD (Classificação Decimal de Dewey). Este sistema, portanto, oferece uma plataforma digital para o registro de termos de acordo com a classificação.

Os recursos atualmente implementados são:

- Busca pelos registros
  - Por assunto ou remissiva;
  - CDD;
  - categoria;
  - se foi enviado para SIBI ou se está normalizado e
  - busca pelo campo "Observação" de cada registro.
- Adição, edição e exlcusão dos registros, tal que cada registro possui esses campos:
  - Enviado para SIBI;
  - Normalizado;
  - Observação;
  - Classificação;
  - Categoria;
  - Remissivas.

Para obter o sistema em sua máquina, siga esses passos:

1. Clone o projeto na sua máquina;
2. Edite no arquivo ```.env```  suas configurações de ```APP_URL``` e *database*;
3. No diretório do projeto, entre:
   1.  ```$ composer install```
   2.  ```$ php artisan key:generate```
   3.  ```$ php artisan serve```