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

    if imgs
      imgDestacada = document.querySelector '.imagem-destacada img'
      botaoVoltar = document.querySelector '.voltar a'
      botaoAvancar = document.querySelector '.avancar a'
      WIDTH = 735
      HEIGHT = 491

      _listeners = ->
        for item, i in imgs by 1
          imgs[i].addEventListener 'click', _exibir

        botaoVoltar.addEventListener 'click', _voltar
        botaoAvancar.addEventListener 'click', _avancar
        return

      _voltar = (evt) ->
        evt.preventDefault()
        for item, i in imgs by 1
          if i >= 5
            imgs[i].style.display = 'none'
          else if i < 5
            imgs[i].style.display = ''

      _avancar = (evt) ->
        evt.preventDefault()
        for item, i in imgs by 1
          if i >= 5
            imgs[i].style.display = ''
          else if i < 5
            imgs[i].style.display = 'none'

      _ativarSlide = (elemento) ->
        elemento.setAttribute 'class', 'slide-ativo'
        return

      _desativarSlides = ->
        for item, i in imgs by 1
          imgs[i].setAttribute 'class', ''
        return

      _esconderSlides = ->
        for item, i in imgs by 1
          if i >= 5
            imgs[i].style.display = 'none'
        return

      _exibir = ->
        srcAtivo = this.getAttribute 'src'
        src = srcAtivo.substr(0, srcAtivo.length - 11) + 'w=' + WIDTH + '&' + 'h=' + HEIGHT
        imgDestacada.setAttribute 'src', src
        _desativarSlides()
        _ativarSlide this
        return

      inicializar = do ->
        _listeners()
        _esconderSlides()
        _ativarSlide imgs[0]
        return
    return

  animBarraSup: ->
    barra = document.querySelector '.barra-superior'

    if barra
      _listeners = ->
        window.addEventListener 'scroll', _animacao
        return

      _animacao = ->
        if this.scrollY > 0
          barra.style.height = '0'
        else if this.scrollY is 0
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
        if this.scrollY > 800
          foto.style.webkitFilter = 'grayscale(0%)'
        else if this.scrollY < 800
          foto.style.webkitFilter = 'grayscale(100%)'
        return

      inicializar = do ->
        _listeners()
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
  return

window.onload = ->
  Apps.ajustarWidthSubmenu()
  return