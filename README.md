# SystemStock
An stock system created to facilitate the material control of my workspace.

# 1.Primeiros Passos

### Banco de Dados e Configuração do Site

+ Abra o arquivo "config.php".
+ Altere a linha 14 para o caminho correto do site (os arquivos js e css estão vinculados a esse caminho).
+ Altere as linhas 20 a 23 de acordo com os dados do banco de dados PHPMyAdmin.

### Banco de Dados PHPMyAdmin
+ Crie uma base de dados chamada "csec" (caso queira mudar o nome da base de dados, deverá também alterar a linha 23 do arquivo "config.php").
+ Importe o arquivo "csec.sql" disponível na pasta para importar os dados disponíveis por backup.

#### O primeiro usuário está definido como:
+ Login: admin
+ Senha : admin

# 2. Pontos Importantes

+ Para melhor controle do banco de dados, antes de adicionar a imagem no material, renomeie o arquivo de imagem para o mesmo número de BMP referente ao material que está adicionando a imagem.
+ Ex.: após tirar a foto da cadeira com bmp nº 389502, renomeie a foto para 389502.jpg e depois adicione ela no sistema
