CRIADO POR VITOR GABRIEL E SILVA EM 14/02/2023
GITHUB: https://github.com/vitor-e-silva
LINKEDIN: https://www.linkedin.com/in/vitor-silva-8a4ab8226/

Sobre o framework {
   Esse framework foi pensando para a simplificação de implementação de MVC (MODEL, VIEWS, CONTROLLERS)
   Caso for usar em seu projeto deixe o Copyright.
}

Config nginx:
        
location / {
 root   html;
 try_files $uri $uri/ /index.php?route=$uri$is_args$args;
 index  index.php;
}

COPYRIGHT 2023
