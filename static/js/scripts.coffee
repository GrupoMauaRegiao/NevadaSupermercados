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

  ajustaWidthSubmenu: ->
    submenus = document.querySelectorAll '.submenu'
    offsetWidths = []

    for item, i in submenus by 1
      offsetWidths[i] = submenus[i].parentNode.offsetWidth
      submenus[i].style.width = offsetWidths[i] - 30 + 'px'
    return

window.onload = ->
  Apps = Nevada.apps;
  Apps.carregarScripts()
  Apps.verificarBrowser()
  Apps.removerBackgroundMenu()
  Apps.ajustaWidthSubmenu()
  return