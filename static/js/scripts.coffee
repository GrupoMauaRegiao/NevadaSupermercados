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

Nevada.apps.carregarScripts()