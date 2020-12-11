@extends('layouts/master')
@section('content')
<main role="main" class="container">
    <div class="starter-template">
        <h1>Bem-vindo à Shophp!</h1>
        <p class="lead">
            Só na Shophp você encontra os produtos de que realmente precisa, por um baixíssimo preço!
        </p>
        <br>
        <br>
        <div class="border border-dark rounded">
            <h2>QUEIMA DE ESTOQUE PÓS-BLACK FRIDAY</h2>
            <p class="lead">
                Não comprou o que queria na Black Friday? Não tem problema!
                <br>
                Aproveite nossas ofertas de queima de estoque pós-Black Friday! Todos os produtos estão com <b>20% DE DESCONTO!!!</b>
            </p>
        </div>
        <br>
        <br>
        <div class="card-group">
            <div class="card border-dark rounded text-center">
                <a href="/clientes">
                    <img class="card-img-top" style="width: 348; height: 348px;" src="./assets/clients.png" alt="Clientes">
                </a>
                <div class="card-body">
                    <h5 class="card-title">Clientes</h5>
                    <p class="card-text">Torne-se um de nossos clientes! Clique no botão abaixo e faça seu cadastro, conheça pessoas que já compraram aqui, altere seus dados, e muito mais!</p>
                    <a href="/clientes" class="btn btn-primary">Ir para Clientes</a>
                </div>
            </div>
            <span style="display:inline-block; width: 8px;"></span>
            <div class="card border-dark rounded text-center">
                <a href="/produtos">
                    <img class="card-img-top" style="width: 348; height: 348px;" src="./assets/products.png" alt="Produtos">
                </a>
                <div class="card-body">
                    <h5 class="card-title">Produtos</h5>
                    <p class="card-text">Conheça nossos produtos! Na Shophp, você sempre encontra exatamente o que você precisa. Aproveite também nossos baixos preços!</p>
                    <a href="/produtos" class="btn btn-primary">Ir para Produtos</a>
                </div>
            </div>
            <span style="display:inline-block; width: 8px;"></span>
            <div class="card border-dark rounded text-center">
                <a href="/compras">
                    <img class="card-img-top" style="width: 348; height: 348px;" src="./assets/purchases.png" alt="Carrinho de Compras">
                </a>
                <div class="card-body">
                    <h5 class="card-title">Carrinho de Compras</h5>
                    <p class="card-text">Veja as suas compras aqui! Você ainda pode alterar a quantidade do produto a ser comprada e, caso necessite, cancelar a compra!</p>
                    <a href="/compras" class="btn btn-primary">Ir para Compras</a>
                </div>
            </div>
        </div>
    </div>
</main>
@stop