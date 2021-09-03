
const itens = [
    
    {
        id: 0,
        img : 'antena',
        descricao : 'Antena Digital'
    },
    
    {
        id: 1,
        img : 'arduino',
        descricao : 'Placa Arduino'
    },
    
    {
        id: 2,
        img : 'minicaixa',
        descricao : 'Mini Caixa de Som'
    },
    
    {
        id: 3,
        img : 'capacitor',
        descricao : 'Capacitores'
    },
    
    {
        id: 4,
        img : 'componente',
        descricao : 'Componentes em Geral'
    },
    
    {
        id: 5,
        img : 'controle',
        descricao : 'controle remoto'
    },
    
    {
        id: 6,
        img : 'fita-led',
        descricao : 'Fita Led'
    },
    
    {
        id: 7,
        img : 'fonte',
        descricao : 'Fontes Externas'
    },
    
    {
        id: 8,
        img : 'hdmi',
        descricao : 'Cabo HDMI'
    },
    
    {
        id: 9,
        img : 'multimetro',
        descricao : 'Multimetro'
    },
    
    {
        id: 10,
        img : 'nobreak',
        descricao : 'Nobreak'
    },
    
    {
        id: 11,
        img : 'parabolica',
        descricao : 'Kit Parabólica'
    },
    
    {
        id: 12,
        img : 'solda',
        descricao : 'Kit Solda'
    },
    
    {
        id: 13,
        img : 'suporte-tv',
        descricao : 'Suporte TV'
    },
    
    {
        id: 14,
        img : 'telefone',
        descricao : 'Telefone'
    },
    
    {
        id: 15,
        img : 'tvbox',
        descricao : 'Tv Box'
    },
    
    {
        id: 16,
        img : 'espaguete',
        descricao : 'Espaguete Termo Retrátil'
    },
    
    {
        id: 17,
        img : 'fone',
        descricao : 'Fone de Ouvido'
    },
    
    {
        id: 18,
        img : 'lanterna',
        descricao : 'Lanterna'
    },
    
    {
        id: 19,
        img : 'ring',
        descricao : 'Ring Light'
    },
    
    {
        id: 20,
        img : 'transformador',
        descricao : 'Auto Transformador'
    }
]

function mostrarProdutos() {
    
    itens.map((item)=>{
        const cardConteudo = `
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 mt-3 " ${item.id}>
        <div class="card">
        <img class="card-img-top" src="../src/img/produtos/${item.img}.jpg" alt="Imagem de capa do card">
        <div class="card-body">
        <p class="card-text text-center">${item.descricao}</p>
        </div>
        </div>
        </div>
        `
        const container = document.querySelector('[data-container-cards]')
        container.innerHTML += cardConteudo    
    })
    
}

mostrarProdutos()