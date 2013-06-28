Nevada = Nevada || {}
Nevada.apps =

  carregarScripts: ->
    scripts = document.getElementsByTagName('script')[0]
    carregar = (url) ->
      script = document.createElement 'script'
      script.async = true
      script.src = url
      scripts.parentNode.insertBefore script, scripts
      return

    # Lista de scripts
    carregar 'http://e.issuu.com/embed.js'
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
      offsetWidths[i] = submenus[i].parentNode.offsetWidth
      submenus[i].style.width = offsetWidths[i] - 30 + 'px'
    return

  slider: ->
    interval = window.interval
    slides = document.querySelectorAll '.slide'
    n = 0

    destacarSlide = (n) ->
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
    timer = ->
      # tempo = n,
      # sendo `n` o tempo desejado em segundos
      tempo = 4
      interval = setInterval ->
        proximo()
        return
      , tempo * 1000
      return

    # Botões "<" (anterior) e ">" (próximo)
    anterior = ->
      if n > 0 then n -= 1 else n = 2
      destacarSlide n
      return

    proximo = ->
      if n < slides.length - 1 then n += 1 else n = 0
      destacarSlide n
      return

    navegacao = ->
      btnAnterior = document.querySelector '.anterior'
      btnProximo = document.querySelector '.proximo'
      btnAnterior.addEventListener 'click', anterior
      btnProximo.addEventListener 'click', proximo
      return

    # Interrompe/continua a apresentação se o cursor
    # estiver/não estiver sobre ela
    pause = ->
      clearInterval interval
      return

    play = ->
      timer()
      return

    pausePlay = ->
      controles = document.querySelector '.controles'
      controles.addEventListener 'mouseover', pause
      controles.addEventListener 'mouseout', play
      return

    inicializar = do ->
      timer()
      pausePlay()
      navegacao()
      return
    return

do ->
  Apps = Nevada.apps
  Apps.carregarScripts()
  Apps.removerBackgroundMenu()
  Apps.ajustarWidthSubmenu()
  Apps.slider()
  return