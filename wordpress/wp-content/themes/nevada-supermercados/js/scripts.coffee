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

  slidesInternas: ->
    imgs = document.querySelectorAll '.lista-imagem img'
    imgDestacada = document.querySelector '.imagem-destacada img'

    if imgs
      _listeners = ->
        for item, i in imgs
          imgs[i].addEventListener 'mouseover', _exibir
        return

      _exibir = ->
        src = this.getAttribute 'src'
        srcPrincipal = src.substr(0, src.length - 11) + 'w=735&h=491'
        imgDestacada.setAttribute 'src', srcPrincipal

        for item, i in imgs
          imgs[i].setAttribute 'class', ''

          this.setAttribute 'class', 'slide-ativo'
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
  Apps.slidesInternas()
  return

window.onload = ->
  Apps.ajustarWidthSubmenu()
  return