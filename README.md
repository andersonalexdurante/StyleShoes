<p align="center"><img src="https://github.com/andersonalexdurante/StyleShoes/blob/master/public/github/Logo-marca.png" width="200"></p>


 ### Repositório de um projeto que fiz como teste para a InfoTech Soluções utilizando PHP e Laravel.
 
 - O projeto consiste em um sistema de loja de tênis online, um e-commerce. 
 - Usuários se cadastram e podem visualizar os produtos (tênis), além de poderem adicionar produtos ao seu carrinho de compras próprio. 
 - Administradores tem controle sobre a plataforma, podendo cadastrar, atualizar e excluir seus produtos (CRUD).
 
 # :fire: Conteúdo
 - [FUNCIONALIDADES](#gem-funcionalidades)
 - [BANCO DE DADOS](#cloud-banco-de-dados)
 - [API REST](#pushpin-api-rest)
 
 ## :gem: Funcionalidades
 
 <h1 align="center">Autenticação e cadastro de usuários</h1>
<p float="left" align="center"><img src="https://github.com/andersonalexdurante/StyleShoes/blob/master/public/github/Screenshot_10.png" width='400px'>
<img src="https://github.com/andersonalexdurante/StyleShoes/blob/master/public/github/Screenshot_11.png" width='400px'></p> 
 
 
<h1 align="center">Visualização da lista de produtos</h1>
<h5 align="center">Repare que o usuário é o administrador, pois ele possui acesso a área de "Gerenciar Produtos"</h5>

<p align="center"><img src="https://github.com/andersonalexdurante/StyleShoes/blob/master/public/github/Screenshot_1.png" width="auto"></p>

<h1 align="center">Visualização de um produto específico</h1>
<h5 align="center">Ao clicar em "Saiba Mais" a página do produto é exibida, contendo mais dados sobre o mesmo. Nesse caso, o usuário não é um administrador, pois não tem o botão "Gerenciar produtos na Nav-Bar. Mesmo que ele tente acessar sabendo a URL, não poderá entrar na página do admin por segurança dos middlewares"</h5>

<p align="center"><img src="https://github.com/andersonalexdurante/StyleShoes/blob/master/public/github/Screenshot_2.png" width="auto"></p>

<h1 align="center">Adicionando um produto ao carrinho de compras</h1>
<h5 align="center">Ao clicar em comprar, ele é avisado se deseja adicionar o produto em seu carrinho (acessado pela Nav-Bar)"</h5>

<p align="center"><img src="https://github.com/andersonalexdurante/StyleShoes/blob/master/public/github/Screenshot_3.png" width="auto"></p>

<h5 align="center">Se clicar em adicionar ao carrinho, ele é redirecionado automáticamente a sua página de compras, onde contêm todos os produtos que ele deseja comprar, podendo ver o preço total e apagar produtos do carrinho. O botão "Comprar produtos" está desativado.</h5>

<p align="center"><img src="https://github.com/andersonalexdurante/StyleShoes/blob/master/public/github/Screenshot_4.png" width="auto"></p>

<h5 align="center">Apagar um produto do carrinho de compras</h5>

<p align="center"><img src="https://github.com/andersonalexdurante/StyleShoes/blob/master/public/github/Screenshot_5.png" width="auto"></p>

<h1 align="center">Gereciamento de Produtos (página exclusiva do administrador)</h1>
<h5 align="center">Aqui o admin tem acesso a uma tabela com todos os produtos cadastrados em seus sistema, podendo alterar e apagar cada um deles, além de poder cadastrar um novo produto</h5>

<p align="center"><img src="https://github.com/andersonalexdurante/StyleShoes/blob/master/public/github/Screenshot_6.png" width="auto"></p>

<h5 align="center">Cadastrando um novo produto</h5>

<p align="center"><img src="https://github.com/andersonalexdurante/StyleShoes/blob/master/public/github/Screenshot_9.png" width="auto"></p>

<h5 align="center">Atualizando informações do produto</h5>

<p align="center"><img src="https://github.com/andersonalexdurante/StyleShoes/blob/master/public/github/Screenshot_8.png" width="auto"></p>

<h5 align="center">Apagando um produto do banco</h5>

<p align="center"><img src="https://github.com/andersonalexdurante/StyleShoes/blob/master/public/github/Screenshot_7.png" width="auto"> </p>

 
 ## :cloud: Banco de dados
    - MySQL + InnoDB para as relações com chave-estrangeira.
    - Autenticação com admin: Email - admin@email.com / Password - admin || Ele já é criado automaticamente ao rodar as migrations.
    - Um produto possui uma imagem
    - Um carrinho é único, ele possui um usuário a quem pertence e o produto que ele deseja comprar. Poderia ser adicionado um atributo "quantidade", por exemplo.
 
<p float="left" align="center"><img src="https://i.ibb.co/V9YWyvq/banco.png" ></p> 
 
 ## :pushpin: API Rest
 #### Utilizei sessions nos controllers para proteção de rotas e não os middlewares do Laravel. 
    //USUÁRIO
    - Route::get('/register', [UserController::class, 'create']);
    - Route::post('/register', [UserController::class, 'store']);
    - Route::post('/authenticate', [UserController::class, 'authenticate']);
    - Route::get('/admin', [UserController::class, 'adminPage']);
    - Route::get('/logout', [UserController::class, 'logout']);
    
    //PRODUTOS
    - Route::get('/products', [ProductController::class, 'index']);
    - Route::get('/product/{id}', [ProductController::class, 'show']);
    - Route::get('/register-product', [ProductController::class, 'create']);
    - Route::post('/register-product', [ProductController::class, 'store']);
    - Route::delete('/delete-product/{id}', [ProductController::class, 'destroy']);
    - Route::get('/update-product/{id}', [ProductController::class, 'updateProductShow']);
    - Route::put('/update-product/{id}', [ProductController::class, 'updateProduct']);

    //CARRINHOS
    - Route::get('/user/cart', [CartController::class, 'index']);
    - Route::post('/product/buy/{id}', [CartController::class, 'store']);
    - Route::delete('/delete/cart/product/{id}', [CartController::class, 'destroy']);

    //404
    - Route::fallback(function() {
        return redirect('/');
      });
