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

Nevada.apps.carregarScripts()
Nevada.apps.verificarBrowser()