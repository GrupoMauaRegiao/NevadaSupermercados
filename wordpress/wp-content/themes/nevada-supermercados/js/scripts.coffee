Nevada = Nevada || {}
Nevada.apps =
  converterSegParaMili: (tempoSegundos) ->
    tempoSegundos * 1000

  carregarScripts: ->
    scripts = document.getElementsByTagName('script')[0]
    _carregar = (url) ->
      script = document.createElement 'script'
      script.async = true
      script.src = url
      scripts.parentNode.insertBefore script, scripts
      return

    # Lista de scripts
    _carregar 'http://e.issuu.com/embed.js'
    return

  removerBackgroundMenu: ->
    menuChildren = document.querySelectorAll('.menu')[0]
    lis = menuChildren.querySelectorAll 'li'

    for i in [0..lis.length - 1] by 1
      if lis[i].innerHTML.match('<ul class="submenu">') is null
        lis[i].setAttribute 'class', 'sem-background'
    return

  ajustarWidthSubmenu: ->
    submenus = document.querySelectorAll '.submenu'
    offsetWidths = []

    for item, i in submenus by 1
      offsetWidths[i] = submenus[i].previousSibling.previousSibling.offsetWidth
      submenus[i].style.width = offsetWidths[i] + 'px'
    return

  # Slideshow
  slider: ->
    slides = document.querySelectorAll '.slide'

    if slides[0]
      interval = window.interval
      n = 0

      _listeners = ->
        controles = document.querySelector '.controles'
        btnAnterior = document.querySelector '.anterior'
        btnProximo = document.querySelector '.proximo'
        btnAnterior.addEventListener 'click', _anterior
        btnProximo.addEventListener 'click', _proximo
        controles.addEventListener 'mouseover', _pause
        controles.addEventListener 'mouseout', _play
        return

      _destacarSlide = (n) ->
        posicoes = [
          'esquerda'
          'centro'
          'direita'
        ]

        arranjos = [
          1, 0, 2
          2, 1, 0
          0, 2, 1
        ]

        if n is 0
          for item, i in arranjos[0..2] by 1
            slides[item].setAttribute 'class', 'slide ' + posicoes[i]
        else if n is 1
          for item, i in arranjos[3..5] by 1
            slides[item].setAttribute 'class', 'slide ' + posicoes[i]
        else if n is 2
          for item, i in arranjos[6..8] by 1
            slides[item].setAttribute 'class', 'slide ' + posicoes[i]
        return

      # Controla o intervalo entre a troca de slides
      _timer = ->
        # tempo = n,
        # sendo `n` o tempo desejado em segundos
        tempo = 4
        paraSegundos = Nevada.apps.converterSegParaMili
        interval = setInterval ->
          _proximo()
          return
        , paraSegundos tempo
        return

      # Botões "<" (anterior) e ">" (próximo)
      _anterior = ->
        if n > 0 then n -= 1 else n = 2
        _destacarSlide n
        return

      _proximo = ->
        if n < slides.length - 1 then n += 1 else n = 0
        _destacarSlide n
        return

      # Interrompe/continua a apresentação se o cursor
      # estiver/não estiver sobre ela
      _pause = ->
        clearInterval interval
        return

      _play = ->
        _timer()
        return

      # Inicializa Slideshow
      inicializar = do ->
        _listeners()
        _timer()
        return
    return

  controlarTamanhoString: (seletor, maxCaract) ->
    tag = document.querySelector(seletor)

    if tag
      if tag.textContent
        texto = tag.textContent
        if texto.length > maxCaract
          tag.textContent = texto.slice(0, maxCaract) + '...'
      else
        texto = tag.innerText
        if texto.length > maxCaract
          tag.innerText = texto.slice(0, maxCaract) + '...'
    return

  configIdIssuu: ->
    embed = document.querySelector '.issuuembed'

    if embed
      link = embed.getAttribute 'data-configid'
      id = link.match /0\/[0-9]*/g
      embed.setAttribute 'data-configid', id[0]
    return

  configIdYouTube: ->
    iframe = document.querySelector '.youtube'

    if iframe
      link = iframe.getAttribute 'src'
      id = link.match /[\w-]{11}/
      iframe.setAttribute 'src', 'http://www.youtube.com/embed/' + id
    return

  sliderPagInternas: ->
    imgs = document.querySelectorAll '.lista-imagem img'

    if imgs[0]
      imgDestacada = document.querySelector '.imagem-destacada img'
      botaoVoltar = document.querySelector '.voltar'
      botaoAvancar = document.querySelector '.avancar'
      WIDTH = 735
      HEIGHT = 491
      nSlide = 0
      paginasVisiveis = 5

      _nodeListParaArray = ->
        arr = []
        for i in imgs
          arr.push i
        arr
      arrImgs = _nodeListParaArray()

      _listeners = ->
        for item, i in imgs by 1
          imgs[i].addEventListener 'click', _ativarClick

        if botaoVoltar
          botaoVoltar.addEventListener 'click', _voltar
        if botaoAvancar
          botaoAvancar.addEventListener 'click', _avancar
        return

      _ativarClick = ->
        nSlide = arrImgs.indexOf this
        _exibir this
        return

      _ativarSlideMiniatura = (elemento) ->
        elemento.setAttribute 'class', 'slide-ativo'
        return

      _desativarSlides = ->
        for item, i in imgs by 1
          imgs[i].setAttribute 'class', ''
        return

      _voltar = (evt) ->
        evt.preventDefault()
        if nSlide > 0
          nSlide -= 1
          if nSlide % paginasVisiveis is 4
            for i in arrImgs.slice nSlide + 1, arrImgs.length
              i.style.display = 'none'
            for i in arrImgs.slice nSlide - 4, nSlide + 1
              i.style.display = ''
          _desativarSlides()
          _exibir imgs[nSlide]
          _ativarSlideMiniatura imgs[nSlide]
        return

      _avancar = (evt) ->
        evt.preventDefault()
        if nSlide < imgs.length - 1
          nSlide += 1
          if nSlide % paginasVisiveis is 0
            for i in arrImgs.slice(0, nSlide)
              i.style.display = 'none'
            for i in arrImgs.slice(nSlide, nSlide + paginasVisiveis)
              i.style.display = ''
          _desativarSlides()
          _exibir imgs[nSlide]
          _ativarSlideMiniatura imgs[nSlide]
        return

      _esconderSlides = ->
        for item, i in imgs by 1
          if i >= 5
            imgs[i].style.display = 'none'
        return

      _exibir = (img) ->
        srcAtivo = img.getAttribute 'src'
        src = srcAtivo.substr(0, srcAtivo.length - 11) + 'w=' + WIDTH + '&' + 'h=' + HEIGHT
        imgDestacada.setAttribute 'src', src
        _desativarSlides()
        _ativarSlideMiniatura img
        return

      inicializar = do ->
        _listeners()
        _esconderSlides()
        _ativarSlideMiniatura imgs[0]
        return
      return

  animBarraSup: ->
    barra = document.querySelector '.barra-superior'

    if barra
      _listeners = ->
        window.addEventListener 'scroll', _animacao
        return

      _animacao = ->
        if this.pageYOffset > 0
          barra.style.height = '0'
        else if this.pageYOffset is 0
          barra.style.height = '15px'
        return

      inicializar = do ->
        _listeners()
        return
    return

  animFilterProprietarios: ->
    foto = document.querySelector '.proprietarios img'

    if foto
      _listeners = ->
        window.addEventListener 'scroll', _animacao
        return

      _animacao = ->
        if this.pageYOffset > 800
          foto.style.webkitFilter = 'grayscale(0%)'

        else if this.pageYOffset < 800
          foto.style.webkitFilter = 'grayscale(100%)'
        return

      inicializar = do ->
        _listeners()
        return
    return

  uploadCurriculo: ->
    campo = document.querySelector '.campo-upload input'

    if campo
      cabecalho = document.querySelector '.cabecalho-formulario-upload h1'
      containerForm = document.querySelector '.formulario'
      formulario = containerForm.children[0]
      formatos = [
        'image/jpeg',
        'application/pdf',
        'application/msword',
        'application/vnd.openxmlformats-officedocument.wordprocessingml.document'
      ]
      alerta = document.querySelector '.alertas'
      p = document.createElement 'p'
      p.innerHTML = ''

      _ativarAnimacao = ->
        alerta.setAttribute 'class', 'alertas on'
        return

      _desativarAnimacao = ->
        alerta.setAttribute 'class', 'alertas'
        return

      _mudarCursor = (cursor) ->
        document.body.style.cursor = cursor
        return

      _exibirMensagem = (mensagem) ->
        cabecalho.innerHTML = mensagem
        containerForm.style.display = 'none'
        return

      _exibirAlerta = (mensagem) ->
        p.innerHTML = mensagem
        alerta.appendChild p
        alerta.style.opacity = '1'
        return

      campo.addEventListener 'change', (evt) ->
        xhr = new XMLHttpRequest()
        arquivo = campo.files[0]
        FILESIZE = (2 * 1024) * 1024

        if xhr.upload
          if arquivo.size <= FILESIZE
            if arquivo.type is formatos[0] \
               or arquivo.type is formatos[1] \
               or arquivo.type is formatos[2] \
               or arquivo.type is formatos[3]
              xhr.upload.onprogress = (evt) ->
                if evt.lengthComputable
                  _mudarCursor 'wait'
                  _exibirMensagem 'Enviando...'
                  _ativarAnimacao()
                  _exibirAlerta 'Carregando o arquivo "' + arquivo.name + '"...'
                return
              xhr.open formulario.method, formulario.action, true
              xhr.setRequestHeader "AJAXUPLOAD", arquivo.name
              xhr.send arquivo
              xhr.onreadystatechange = ->
                if xhr.readyState is 4 and xhr.status is 200
                  _mudarCursor 'auto'
                  _exibirMensagem 'Currículo enviado!'
                  _desativarAnimacao()
                  _exibirAlerta 'Arquivo "' + arquivo.name + '" carregado com sucesso!'
                return
            else
              _exibirAlerta 'Formato de arquivo inválido. Envie apenas .docx, .doc, .pdf ou .jpg.'
          else
            _exibirAlerta 'Seu arquivo possui ' +
                          ((arquivo.size / 1024) / 1024).toFixed(1) +
                          ' MB e ultrapassa o limite de ' + ((FILESIZE / 1024) / 1024).toFixed(1) +
                          ' MB permitidos.'
        return
    return

Apps = Nevada.apps
do ->
  Apps.carregarScripts()
  Apps.removerBackgroundMenu()
  Apps.slider()
  Apps.controlarTamanhoString '.nome-produto p', 25
  Apps.configIdIssuu()
  Apps.configIdYouTube()
  Apps.animBarraSup()
  Apps.animFilterProprietarios()
  Apps.sliderPagInternas()
  Apps.uploadCurriculo()
  return

window.onload = ->
  Apps.ajustarWidthSubmenu()
  return