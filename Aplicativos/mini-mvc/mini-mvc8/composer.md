{
    "name": "ribafs/mini-full", - nome do projeto
    "description": "Aplicactivo mini completo em PHP com MVC", - Descrição do projeto
    "type": "project", - Tipo
    "license": "MIT", - licença
    "authors": [ - autores
        {
            "name": "Ribamar FS",
            "email": "ribafs@gmail.com"
        }
    ],
	"minimum-stability": "stable", - mínima estabilidade necessária
  "require":{ - pacotes requeridos para instalação
    "php": ">=5.6.4",
        "tracy/tracy": "^2.7",
        "filp/whoops": "^2.7"
  },
    "autoload": - autoload, usando psr-4
    {
        "psr-4":
        {
            "App\\" : "App/",
            "Core\\" : "Core/"
        }
    }
}

Após qualquer alteração posterior deste arquivo (composer.json), devemos executar o comando:

cd mini-mvc8

composer dumpautoloader
