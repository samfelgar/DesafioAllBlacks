$(document).ready(function () {

    $('.data-table').DataTable({
        'processing': true,
        'serverSide': true,
        'ajax': base_url + 'torcedores/listar',
        'language': {
            "sEmptyTable": "Nenhum registro encontrado.",
            "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
            "sInfoFiltered": "(Filtrados de _MAX_ registros)",
            "sInfoPostFix": "",
            "sInfoThousands": ".",
            "sLengthMenu": "Mostrando _MENU_ resultados por página",
            "sLoadingRecords": "Carregando...",
            "sProcessing": "Processando...",
            "sZeroRecords": "Nenhum registro encontrado.",
            "sSearch": "Pesquisar",
            "oPaginate": {
                "sNext": "Próximo",
                "sPrevious": "Anterior",
                "sFirst": "Primeiro",
                "sLast": "Último"
            },
            "oAria": {
                "sSortAscending": ": Ordenar colunas de forma ascendente",
                "sSortDescending": ": Ordenar colunas de forma descendente"
            }
        }
    });

    $('.go-back').click(function () {
        history.back();
    });

    $('.container').on('click', '.confirm', function () {
        return confirm('Deseja completar esta ação?');
    });

    // Máscara alternando entre telefones com 8 e 9 dígitos
    var behavior = function (val) {
        return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
    },
    options = {
        onKeyPress: function (val, e, field, options) {
            field.mask(behavior.apply({}, arguments), options);
        }
    };

    $('.phone').mask(behavior, options);

    // Máscara alternando entre CPF e CNPJ

    var behaviorDoc = function (val) {
        return val.replace(/\D/g, '').length > 11 ? '00.000.000/0000-00' : '000.000.000-009';
    };
    var optionsDoc = {
        onKeyPress: function (val, e, field, optionsDoc) {
            field.mask(behaviorDoc.apply({}, arguments), optionsDoc);
        }
    }

    $('.documento').mask(behaviorDoc, optionsDoc);

    $('.cep').mask('00.000-000');

    $('.import-xml').click(function (e) {
        e.preventDefault();
        var btn = $(this);
        var url = btn.attr('href');
        var body = $('.modal-body');
        var loading = $('<img>');
        var footer = $('.modal-footer');
        footer.addClass('d-none');
        body.addClass('text-center');
        loading.attr('src', base_url + 'assets/images/loading2.gif');
        body.html(loading);
        body.append('<p>Esta ação pode demorar alguns segundos. Por favor, aguarde.</p>');
        $('.modal').modal({
            'backdrop': 'static',
            'keyboard': false
        });
        $.get({
            url: url,
            dataType: 'html',
            success: function(response) {
                body.html(response);
                footer.removeClass('d-none');
            },
            error: function() {
                body.html('Não foi possível concluir sua transação.');
                footer.removeClass('d-none');
            }
        });
    });

    $('.import-planilha').click(function (e) {
        e.preventDefault();
        var form = $('#planilha');
        var formData = new FormData(form[0]);
        var url = form.attr('action');
        var body = $('.modal-body');
        var loading = $('<img>');
        var footer = $('.modal-footer');
        footer.addClass('d-none');
        body.addClass('text-center');
        loading.attr('src', base_url + 'assets/images/loading2.gif');
        body.html(loading);
        body.append('<p>Esta ação pode demorar alguns segundos. Por favor, aguarde.</p>');
        $('.modal').modal({
            'backdrop': 'static',
            'keyboard': false
        });
        $.post({
            url: url,
            data: formData,
            enctype: 'multipart/form-data',
            processData: false,
            contentType: false,
            cache: false,
            success: function(response) {
                body.html(response);
                footer.removeClass('d-none');
            },
            error: function() {
                body.html('Não foi possível concluir sua transação.');
                footer.removeClass('d-none');
            }
        });
    });

    $('.send-mail').click(function (e) {
        e.preventDefault();
        var form = $('#mala'); 
        var url = form.attr('action');
        var body = $('.modal-body');
        var loading = $('<img>');
        var footer = $('.modal-footer');
        footer.addClass('d-none');
        body.addClass('text-center');
        loading.attr('src', base_url + 'assets/images/loading2.gif');
        body.html(loading);
        body.append('<p>Esta ação pode demorar alguns segundos. Por favor, aguarde.</p>');
        $('.modal').modal({
            'backdrop': 'static',
            'keyboard': false
        });
        $.post({
            url: url,
            data: form.serialize(),
            dataType: 'html',
            success: function(response) {
                body.html(response);
                footer.removeClass('d-none');
            },
            error: function() {
                body.html('Não foi possível concluir sua transação.');
                footer.removeClass('d-none');
            }
        });
    });

    $('.container').on('click', '.full-address', function (e) {
        e.preventDefault();
        var btn = $(this);
        var url = btn.attr('href');
        var body = $('.modal-body');
        $.get({
            url: url,
            dataType: 'html',
            success: function(response) {
                body.html(response);
                $('.modal').modal();
            },
            error: function() {
                body.html('Não foi possível concluir sua transação.');
            }
        });
    });

    $('.rich').richText({
        // text formatting
        bold: true,
        italic: true,
        underline: true,
        
        // text alignment
        leftAlign: true,
        centerAlign: true,
        rightAlign: true,
        
        // lists
        ol: true,
        ul: true,
        
        // title
        heading: true,
        
        // fonts
        fonts: true,
        fontList: [
            "Arial", 
            "Arial Black", 
            "Comic Sans MS", 
            "Courier New", 
            "Geneva", 
            "Georgia", 
            "Helvetica", 
            "Impact", 
            "Lucida Console", 
            "Tahoma", 
            "Times New Roman",
            "Verdana"
        ],
        fontColor: true,
        fontSize: true,
        
        // uploads
        imageUpload: true,
        fileUpload: false,
        
        // link
        urls: true,
        
        // tables
        table: true,
        
        // code
        removeStyles: true,
        code: true,
        
        // colors
        colors: [],
        
        // dropdowns
        fileHTML: '',
        imageHTML: '',
        
        // translations
        translations: {
            'title': 'Título',
            'white': 'Branco',
            'black': 'Preto',
            'brown': 'Marrom',
            'beige': 'Bege',
            'darkBlue': 'Azul Escuro',
            'blue': 'Azul',
            'lightBlue': 'Azul Claro',
            'darkRed': 'Vinho',
            'red': 'Vermelho',
            'darkGreen': 'Verde Escuro',
            'green': 'Verde',
            'purple': 'Roxo',
            'darkTurquois': 'Turquesa Escuro',
            'turquois': 'Turquesa',
            'darkOrange': 'Laranja Escuro',
            'orange': 'Laranja',
            'yellow': 'Amarelo',
            'imageURL': 'Imagem URL',
            'fileURL': 'Arquivo URL',
            'linkText': 'Link',
            'url': 'URL',
            'size': 'Tamanho',
            'responsive': '<a href="https://www.jqueryscript.net/tags.php?/Responsive/">Responsivo</a>',
            'text': 'Texto',
            'openIn': 'Abrir em',
            'sameTab': 'Mesma aba',
            'newTab': 'Nova aba',
            'align': 'Alinhar',
            'left': 'Esquerda',
            'center': 'Centro',
            'right': 'Direita',
            'rows': 'Linhas',
            'columns': 'Colunas',
            'add': 'Adicionar',
            'pleaseEnterURL': 'Insira uma URL',
            'videoURLnotSupported': 'Video URL não suportada',
            'pleaseSelectImage': 'Selecione uma imagem',
            'pleaseSelectFile': 'Selecione um arquivo',
            'bold': 'Negrito',
            'italic': 'Italico',
            'underline': 'Sublinhado',
            'alignLeft': 'Alinhar à esquerda',
            'alignCenter': 'Alinhar ao centro',
            'alignRight': 'Alinhar à direita',
            'addOrderedList': 'Adicionar lista ordenada',
            'addUnorderedList': 'Adicionar lista',
            'addHeading': 'Adicionar cabeçalho',
            'addFont': 'Adicionar fonte',
            'addFontColor': 'Adicionar cor de fonte',
            'addFontSize' : 'Adicionar tamanho de fonte',
            'addImage': 'Adicionar imagem',
            'addVideo': 'Adicionar vídeo',
            'addFile': 'Adicionar arquivo',
            'addURL': 'Adicionar URL',
            'addTable': 'Adicionar tabela',
            'removeStyles': 'Remover estilos',
            'code': 'Mostrar código HTML',
            'undo': 'Desfazer',
            'redo': 'Refazer',
            'close': 'Fechar'
        },
    
        // dev settings
        useSingleQuotes: false,
        height: 0,
        heightPercentage: 0,
        id: "msg",
        class: "rich",
        useParagraph: false
        
    });
});