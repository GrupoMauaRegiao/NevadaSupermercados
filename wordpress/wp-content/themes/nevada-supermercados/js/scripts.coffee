Nevada = Nevada || {}
Nevada.apps =
  indexOf: ->
    # Mozilla Developer Network
    unless Array::indexOf
      Array::indexOf = (searchElement) -> #, fromIndex
        'use strict'
        throw new TypeError() unless this?
        n = undefined
        k = undefined
        t = Object(this)
        len = t.length >>> 0
        return -1  if len is 0
        n = 0
        if arguments.length > 1
          n = Number(arguments[1])
          unless n is n # shortcut for verifying if it's NaN
            n = 0
          else n = (n > 0 or -1) * Math.floor(Math.abs(n)) \
          if n isnt 0 and n isnt Infinity and n isnt -Infinity
        return -1  if n >= len
        k = (if n >= 0 then n else Math.max(len - Math.abs(n), 0))
        while k < len
          return k  if k of t and t[k] is searchElement
          k++
        -1
      return

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

        if btnAnterior.addEventListener
          btnAnterior.addEventListener 'click', _anterior
          btnProximo.addEventListener 'click', _proximo
          controles.addEventListener 'mouseover', _pause
          controles.addEventListener 'mouseout', _play
        else
          # IE < 9
          btnAnterior.attachEvent 'onclick', _anterior
          btnProximo.attachEvent 'onclick', _proximo
          controles.attachEvent 'onmouseover', _pause
          controles.attachEvent 'onmouseout', _play
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
    tag = document.querySelectorAll seletor
    if tag[0]
      if tag[0].textContent
        for item in tag by 1
          texto = item.textContent
          if texto.length > maxCaract
            item.textContent = texto.slice(0, maxCaract) + '...'
      else
        for item in tag by 1
          texto = item.innerText
          if texto.length > maxCaract
            item.innerText = texto.slice(0, maxCaract) + '...'
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

  sliderPagInternas: (container) ->
    imgs = document.querySelectorAll container + ' .lista-imagem img'

    if imgs[0]
      imgDestacada = document.querySelector container + ' .imagem-destacada img'
      botaoVoltar = document.querySelector container + ' .voltar'
      botaoAvancar = document.querySelector container + ' .avancar'
      WIDTH = 735
      HEIGHT = 491
      nSlide = 0
      paginasVisiveis = 5

      _nodeListParaArray = ->
        arr = []
        for i in imgs by 1
          arr.push i
        arr
      arrImgs = _nodeListParaArray()

      _listeners = ->

        _ie8 = (evt) ->
          caller = evt.srcElement
          nSlide = arrImgs.indexOf caller
          _exibir caller
          return

        for item, i in imgs by 1
          if imgs[i].addEventListener
            imgs[i].addEventListener 'click', _ativarClick
          else
            # IE < 9 :(
            imgs[i].attachEvent 'onclick', _ie8

        if botaoVoltar
          if botaoVoltar.addEventListener
            botaoVoltar.addEventListener 'click', _voltar
          else
            # IE < 9
            botaoVoltar.attachEvent 'onclick', _voltar

        if botaoAvancar
          if botaoAvancar.addEventListener
            botaoAvancar.addEventListener 'click', _avancar
          else
            # IE < 9
            botaoAvancar.attachEvent 'onclick', _avancar
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

        if evt.preventDefault
          evt.preventDefault()
        else
          # IE < 9
          evt.returnValue = false
        return

      _avancar = (evt) ->
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

        if evt.preventDefault
          evt.preventDefault()
        else
          # IE < 9
          evt.returnValue = false
        return

      _esconderSlides = ->
        for item, i in imgs by 1
          if i >= 5
            imgs[i].style.display = 'none'
        return

      _exibir = (img) ->
        srcAtivo = img.getAttribute('src')
        src = srcAtivo.substr(0, srcAtivo.length - 11) +
              'w=' + WIDTH + '&' +
              'h=' + HEIGHT
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
        if window.addEventListener
          window.addEventListener 'scroll', _animacao
        else
          # IE < 9
          window.attachEvent 'onscroll', _animacao
        return

      _animacao = ->
        unless this.pageYOffset
          barra.style.height = '0'

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
        if window.addEventListener
          window.addEventListener 'scroll', _animacao
        else
          # IE < 9
          window.attachEvent 'onscroll', _animacao
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
       'application/stream'
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
        alerta.style.opacity = 1
        return

      if campo.addEventListener
        campo.addEventListener 'change', (evt) ->
          xhr = new XMLHttpRequest()
          arquivo = campo.files[0]
          FILESIZE = (2 * 1024) * 1024

          if xhr.upload
            if arquivo.size <= FILESIZE
              if arquivo.type is formatos[0] \
                 or arquivo.type is formatos[1] \
                 or arquivo.type is formatos[2] \
                 or arquivo.type is formatos[3] \
                 or arquivo.type is formatos[4]
                xhr.upload.onprogress = (evt) ->
                  if evt.lengthComputable
                    _mudarCursor 'wait'
                    _exibirMensagem 'Enviando...'
                    _ativarAnimacao()
                    _exibirAlerta 'Carregando o arquivo "' +
                                  arquivo.name + '"...'
                  return
                xhr.open formulario.method, formulario.action, true
                xhr.setRequestHeader "AJAXUPLOAD", arquivo.name
                xhr.send arquivo
                xhr.onreadystatechange = ->
                  if xhr.readyState is 4 and xhr.status is 200
                    _mudarCursor 'auto'
                    _exibirMensagem 'Currículo enviado!'
                    _desativarAnimacao()
                    _exibirAlerta 'Arquivo "' +
                                  arquivo.name +
                                  '" carregado com sucesso!'
                  return
              else
                _exibirAlerta 'Formato de arquivo inválido. ' +
                              'Envie apenas .docx, .doc, .pdf ou .jpg.'
            else
              _exibirAlerta 'Seu arquivo possui ' +
                            ((arquivo.size / 1024) / 1024).toFixed(1) +
                            ' MB e ultrapassa o limite de ' +
                            ((FILESIZE / 1024) / 1024).toFixed(1) +
                            ' MB permitidos.'
          return
      else
        # IE < 9
        campo.attachEvent 'onchange', (evt) ->
          _exibirMensagem 'Seu navegador não oferece suporte a este ' +
                          'recurso. <br /><small>Mas você pode enviar o ' +
                          'seu currículo para o e-mail: ' +
                          'curriculo@nevadasupermercados.com.br</small>'
          return
    return

  ajustarBackground: ->
    cabecalho = document.querySelectorAll '.cabecalho-textual'

    if cabecalho
      for item in cabecalho by 1
        w = if item.textContent then item.textContent.length * 20 \
            else item.innerText.length * 20
        item.style.width = w + 'px'
    return

  transicaoPaginas: ->
    pagina = document.body
    links = document.querySelectorAll '.menu a'

    _animacao_ie8 = (evt) ->
      _this = evt.srcElement
      interval = setInterval ->
        window.location = _this.href
        return
      , 1500
      return

    _animacao = (evt) ->
      _this = this
      pagina.style.opacity = 0
      interval = setInterval ->
        window.location = _this.getAttribute 'href'
        return
      , 1500

      if evt.preventDefault
        evt.preventDefault()
      else
        # IE < 9
        evt.returnValue = false
      return

    for item in links by 1
      if item.addEventListener
        item.addEventListener 'click', _animacao
      else
        # IE < 9
        item.attachEvent 'onclick', _animacao_ie8
    return

  exibirPagina: ->
    pagina = document.body
    pagina.style.opacity = 1
    return

  removerLoading: ->
    pagina = document.body
    pagina.setAttribute 'class', ''
    return

  enviarEmail: ->
    formulario = document.querySelector '.formulario-contato form'

    if formulario
      # cTEXT === campoTEXT
      cNome = document.querySelector '#campo-nome'
      cEmail = document.querySelector '#campo-email'
      cLoja = document.querySelector '#campo-loja'
      cMsg = document.querySelector '#campo-mensagem'
      msgSucesso = document.querySelector '.mensagem-sucesso p'
      botao = document.querySelector '#botao-enviar'

      if botao.addEventListener
        botao.addEventListener 'click', (evt) ->
          xhr = new XMLHttpRequest()
          regexEmail = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/
          msg = ''

          if cNome.value isnt ''
            if cEmail.value isnt '' and cEmail.value.match(regexEmail) isnt null
              if cLoja.options.selectedIndex isnt 0
                if cMsg.value isnt ''
                  msg += 'campo-nome=' + encodeURI(cNome.value)
                  msg += '&campo-email=' + encodeURI(cEmail.value)
                  msg += '&campo-loja=' + encodeURI(cLoja.options[cLoja.options.selectedIndex].innerHTML)
                  msg += '&campo-mensagem=' + encodeURI(cMsg.value)
                  xhr.open formulario.method, formulario.action + '?' + msg, true
                  xhr.send msg
                  xhr.onreadystatechange = ->
                    if xhr.readyState is 4 and xhr.status is 200
                      formulario.style.display = 'none'
                      msgSucesso.setAttribute 'class', 'mensagem-sucesso exibe'
                    return
                else
                  cMsg.focus()
                  cMsg.setAttribute 'class', 'erro'
              else
                cLoja.focus()
                cLoja.setAttribute 'class', 'erro'
            else
              cEmail.focus()
              cEmail.setAttribute 'class', 'erro'
          else
            cNome.focus()
            cNome.setAttribute 'class', 'erro'

          if evt.preventDefault
            evt.preventDefault()
          else
            # IE < 9
            evt.returnValue = false
          return
      else
        # IE < 9
        botao.attachEvent 'onclick', (evt) ->
          xhr = new XMLHttpRequest()
          regexEmail = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/
          msg = ''

          if cNome.value isnt ''
            if cEmail.value isnt '' and cEmail.value.match(regexEmail) isnt null
              if cLoja.options.selectedIndex isnt 0
                if cMsg.value isnt ''
                  msg += 'campo-nome=' + encodeURI(cNome.value)
                  msg += '&campo-email=' + encodeURI(cEmail.value)
                  msg += '&campo-loja=' + encodeURI(cLoja.options[cLoja.options.selectedIndex].innerHTML)
                  msg += '&campo-mensagem=' + encodeURI(cMsg.value)
                  xhr.open formulario.method, formulario.action + '?' + msg, true
                  xhr.send msg
                  xhr.onreadystatechange = ->
                    if xhr.readyState is 4 and xhr.status is 200
                      formulario.style.display = 'none'
                      msgSucesso.setAttribute 'class', 'mensagem-sucesso exibe'
                    return
                else
                  cMsg.focus()
                  cMsg.setAttribute 'class', 'erro'
              else
                cLoja.focus()
                cLoja.setAttribute 'class', 'erro'
            else
              cEmail.focus()
              cEmail.setAttribute 'class', 'erro'
          else
            cNome.focus()
            cNome.setAttribute 'class', 'erro'

          if evt.preventDefault
            evt.preventDefault()
          else
            # IE < 9
            evt.returnValue = false
          return
    return

Apps = Nevada.apps
do ->
  Apps.indexOf()
  Apps.transicaoPaginas()
  Apps.carregarScripts()
  Apps.removerBackgroundMenu()
  Apps.ajustarBackground()
  Apps.controlarTamanhoString '.nome-produto p', 25
  Apps.slider()
  Apps.configIdIssuu()
  Apps.configIdYouTube()
  Apps.animBarraSup()
  Apps.animFilterProprietarios()
  Apps.sliderPagInternas '.evento-agita'
  Apps.sliderPagInternas '.evento-doacao-sangue'
  Apps.sliderPagInternas '.evento-vacinacao'
  Apps.sliderPagInternas '.evento-gincana-solidaria'
  Apps.sliderPagInternas '.evento-exame-vista'
  Apps.sliderPagInternas '.apresentacao-cursos-palestras'
  Apps.sliderPagInternas '.apresentacao-lojas'
  Apps.uploadCurriculo()
  Apps.enviarEmail()
  return

window.onload = ->
  Apps.ajustarWidthSubmenu()
  Apps.removerLoading()
  Apps.exibirPagina()
  return