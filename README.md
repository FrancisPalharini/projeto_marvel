**PRE REQUISITOS**

    Xampp  3.3.0 
    PHP 8.0.17 
    Laravel 9.2
    Node 16.14.2
    Composer 2.3.3

**INICIANDO**

    1.  Instale o Xampp para simular o servidor local. Os pacotes obrigatórios são o PHP, MySQL e o Apache;
    2.  Start o Xampp e inicie o Appache e o MySQL;
    3.  Faça download do projeto e extraia;
    4.  Faça um cópia do arquivo .env.example e remonei para  .env;
    5.  No arquivo .env você pode alterar as informações de usuário e senha do seu banco de dados, caso seja diferente do que ja se encontra no arquivo; 
    5.  Abra o promt de comando de seu computador;
    6.  Entre no diretório onde extraiu o projeto e de o comando "composer install"
    7.  O processo de instalação irá inicar ao final deve aparecer {
        Use the 'composer fund' commandto findout more!
        } 
    8.  Em seguida rode "php artisan serve" em seguida deve retornar {
        "Starting Laravel development server: http://localhost:8000
        }
    9.  Abra o navegador e entre em http://localhost:8080/phpmyadmin/
    10.  Crie um banco de dados com o nome 'projeto_marvel' (script SQl: create database database_name character set UTF8 collate utf8_general_ci;)
    11. Digite o comando 'php artisan migrate', se o banco for porpulado com novas tabelas o seu uso está pronto.
 

**DOCUMENTAÇÃO**

    https://documenter.getpostman.com/view/20336362/UVyxPD61

**TEST INFORMATION-QA**


    CRIANDO USER {
        -register
        1.  utilize a rota (Route::post('/register',[AuthController::class,'register'])->name('register.create');
        ) passe os seguintes parametros: {name, email e password}
        2. espera-se o seguinte resultados:{

        }
        -login
        1.  utilize a rota (Route::post('/login',[AuthController::class,'login'])->name('register.login');)
        e passe os seguintes parametros: {email e password}
        2. espera-se o seguinte resultados:{

        }
    }

    CRIANDO NOVA PRODUCTION {
        -login com user administrativo
        1.  utilize a rota (Route::post('/login',[AuthController::class,'login'])->name('register.login');)
        e passe os seguintes parametros: {email e password}
        2. espera-se o seguinte resultados:{


        }
        3. salve o token que foi gerado;
        -criando novo registr{
        4. utilize a rota (Route::post('/productions', [ProductionController::class, 'store'])->name('productions.store');)
        5. passe os seguintes parametros:{name, release_date, type, director};
        6. o token salvo  deve ser inserido na aba autorização com o tipo bearer token;
        7. headers deve conter [{"key":"Accept","value":"application/json","description":null,"type":"text","enabled":true}];
        8. espera-se o seguinte resultados:{


        }
        }
    }


    EDITANDO UMA PRODUCTION{
        -login com user administrativo
        1.  utilize a rota (Route::post('/login',[AuthController::class,'login'])->name('register.login');)
        e passe os seguintes parametros: {email e password}
        2. espera-se o seguinte resultados:{

        }
        3. salve o token que foi gerado;
        4. utilize a rota     Route::put('/productions/{id}', [ProductionController::class, 'update'])->name('productions_id.update');
        5. passe os seguintes parametros:{id};
        7. insira os dados que devem ser alterados;
        8. o token salvo  deve ser inserido na aba autorização com o tipo bearer token;
        9. headers deve conter [{"key":"Accept","value":"application/json","description":null,"type":"text","enabled":true}];
        10. espera-se o seguinte resultados:{


        }
        }

    DELETANDO UMA PRODUCTION{
        -login com user administrativo
        1.  utilize a rota (Route::post('/login',[AuthController::class,'login'])->name('register.login');)
        e passe os seguintes parametros: {email e password}
        2. espera-se o seguinte resultados:{

        }
        3. salve o token que foi gerado;

        -delete do registro
        4. utilize a rota ( Route::delete('/productions/{id}', [ProductionController::class, 'destroy'])->name('productions_id.destroy'); )
        5. passe os seguintes parametros:{id};
        8. o token salvo  deve ser inserido na aba autorização com o tipo bearer token;
        9. headers deve conter [{"key":"Accept","value":"application/json","description":null,"type":"text","enabled":true}];
        10. espera-se o seguinte resultados:{


        }
        }

    VISUALIZANDO AS PRODUCTIONS CRIADAS{
        - todas as productions{
            1.utilize a rota (Route::get('/productions', [ProductionController::class, 'index']);)
            2. espera-se o seguinte resultados:{


                }
        }
        - pesquisando por id{
            1.  utilize a Route::get('/productions/{id}', [ProductionController::class, 'show'])->name('productions_id.show');
            2.  passe os seguintes parametros: {id}
            2. espera-se o seguinte resultados:{

            }

        }
        -pesquisando por name{
            1.  utilize a Route::get('/productions/search/{name}', [ProductionController::class, 'search'])->name('productions_name.search');
            2.  passe os seguintes parametros: {name}
            2. espera-se o seguinte resultados:{

            }
        }

    }

    LOGOUT DO USER ADMIN{
        -login com user administrativo
            1.  utilize a rota (Route::post('/login',[AuthController::class,'login'])->name('register.login');)
            e passe os seguintes parametros: {email e password}
            2. espera-se o seguinte resultados:{

            }
            3. salve o token que foi gerado;

            -delete do registro
            4. utilize a rota   (Route::post('/logout',[AuthController::class,'logout'])->name('register.logout');)
            5. passe os seguintes parametros:{email, password};
            8. o token salvo  deve ser inserido na aba autorização com o tipo bearer token;
            9. headers deve conter [{"key":"Accept","value":"application/json","description":null,"type":"text","enabled":true}];
            10. espera-se o seguinte resultados:{


    }
    }

    VOTANDO NA PRODUÇÃO FAVORITA{
            1.  utilize a rota (Route::post('/votes',[VoteController::class, 'vote'])-> name('vote.create');)
            2.  passe os seguintes parametros: {id_prod, name_employee, team, age, genre, vote}
            3.  ATENÇÃO o parametro {vote} sempre será 1;
            3. espera-se o seguinte resultados:{

            }
    }


    VISUALIZANDO TODOS VOTOS SALVOS{
        1.  utilize a rota Route::get('/votes',[VoteController::class, 'index'])-> name('vote.index');
        2. espera-se o seguinte resultados:{

        }
    }

    VISUALIZANDO PRODUÇÃO FAVORITA{
        1.  utilize a rota Route::get('/filters', [QueryController::class, 'favorite_production'])->name('filters.favorite_production');
        2. espera-se o seguinte resultados:{

        }
    }

    VISUALIZANDO PRODUÇÃO FAVORITA POR TIPO{
        1.  utilize a rota Route::get('/filters/{type}', [QueryController::class, 'favorite_byType'])->name('filters.favorite_byType');
        2.  passe os seguintes parametros: {type} que deve ser S - series ou M - movies
        3. espera-se o seguinte resultados:{

        }
    }

    VISUALIZANDO TOP 10 DAS PRODUÇÕES FAVORITAS{
        1.  utilize a rota Route::get('/filters/ranking/top10', [QueryController::class, 'top10'])->name('filters.top10');
        2. espera-se o seguinte resultados:{

        }
    }

    VISUALIZANDO RANKING PRODUÇÕES FAVORITAS POR GENERO{
        1.  utilize a rota Route::get('/filters/ranking/by/genre/{genre}', [QueryController::class, 'ranking_byGenre'])->name('filters.ranking_byGenre');
        2.  passe os seguintes parametros: {genre} que deve ser F - feminino, M - masculino, N - não-binario, O - prefiro não dizer
        2. espera-se o seguinte resultados:{

        }
    }

    VISUALIZANDO RANKING PRODUÇÕES FAVORITAS POR TEAM{
        1.  utilize a rota Route::get('/filters/ranking/by/team/{team}', [QueryController::class, 'ranking_byTeam'])->name('filters.ranking_byTeam');
        2.  passe os seguintes parametros: {team} 
        2. espera-se o seguinte resultados:{

        }
    }

    VISUALIZANDO RANKING PRODUÇÕES FAVORITAS DOS FUNCIONÁRIOS ATÉ 25 ANOS{
        1.  utilize a rota Route::get('/filters/ranking/by/age25', [QueryController::class, 'ranking_byAge25'])->name('filters.ranking_byAge25');
        2. espera-se o seguinte resultados:{

        }
    }

    VISUALIZANDO RANKING DE PRODUÇÕES FAVORITAS DOS FUNCIONÁRIOS COM IDADE MAIOR QUE 25 ANOS{
        1.  utilize a rota Route::get('/filters/ranking/by/age', [QueryController::class, 'ranking_byAge'])->name('filters.ranking_byAge');
        2. espera-se o seguinte resultados:{

        }
    }

    VISUALIZANDO PRODUÇÃO FAVORITAS DO FUNCIONÁRIO{
        1.  utilize a rota Route::get('/filters/favorite/{name}', [QueryController::class, 'favorite'])->name('filters.favorite');
        2.  passe os seguintes parametros: {name_employee} 
        3. espera-se o seguinte resultados:{

        }
    }


