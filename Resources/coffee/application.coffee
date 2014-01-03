# This file is part of the DunglasTodoMVCBundle package.
#
# (c) Kévin Dunglas <dunglas@gmail.com>
#
# For the full copyright and license information, please view the LICENSE
# file that was distributed with this source code.

define [
  'chaplin'
  'models/todos'
  'controllers/header_controller'
  'controllers/footer_controller'
  'controllers/todos_controller'
  'views/layout'
  'jquery'
], (Chaplin, Todos, HeaderController, FooterController, TodosController, Layout, $) ->
  'use strict'

  # The application object
  # Choose a meaningful name for your application
  class Application extends Chaplin.Application
    title: ' • TodoMVC'

    initialize: ->
      super

      # CSRF protection
      # Regex from jquery.cookie
      xsrfCookie = new RegExp('(?:^|; )' + encodeURIComponent('XSRF-TOKEN') + '=([^;]*)').exec(document.cookie)
      if xsrfCookie
        $.ajaxSetup(
          headers:
            'X-XSRF-TOKEN': xsrfCookie[1]
        )

      # Application-specific scaffold
      @initControllers()

      # Freeze the application instance to prevent further changes
      Object.freeze? this

    # Override standard layout initializer
    # ------------------------------------
    initLayout: ->
      # Use an application-specific Layout class. Currently this adds
      # no features to the standard Chaplin Layout, it’s an empty placeholder.
      @layout = new Layout {@title}

    # Instantiate common controllers
    # ------------------------------
    initControllers: ->
      # These controllers are active during the whole application runtime.
      # You don’t need to instantiate all controllers here, only special
      # controllers which do not to respond to routes. They may govern models
      # and views which are needed the whole time, for example header, footer
      # or navigation views.
      # e.g. new NavigationController()
      new HeaderController()
      new TodosController()
      new FooterController()      

    # Create additional mediator properties
    # -------------------------------------
    initMediator: ->
      # Add additional application-specific properties and methods
      Chaplin.mediator.todos = new Todos()
      # Seal the mediator
      Chaplin.mediator.seal()
