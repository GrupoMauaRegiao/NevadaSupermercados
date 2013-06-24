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

  verificarBrowser: ->
    if navigator.userAgent.match('Chrome') is null
      body = document.querySelector 'body'
      body.setAttribute 'class', 'no-chrome'
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

  ajustarWidths: ->
    slides = document.querySelector '.slides'
    rodape = document.querySelector '.rodape'
    widthPagina = window.innerWidth

    if widthPagina > 960
      slides.style.width = widthPagina + 'px'
      rodape.style.width = widthPagina + 'px'
    return

  slider: ->
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

    padronizarSlides = ->
      if n < slides.length - 1 then n += 1 else n = 0
      destacarSlide n
      return

    interval = setInterval (->
      padronizarSlides()
      return
    ), 4000

    return

window.onload = ->
  Apps = Nevada.apps
  Apps.carregarScripts()
  Apps.verificarBrowser()
  Apps.removerBackgroundMenu()
  Apps.ajustarWidthSubmenu()
  Apps.ajustarWidths()
  Apps.slider()
  return