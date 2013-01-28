define [
  'chaplin'
  'models/todos'
  'controllers/header_controller'
  'controllers/footer_controller'
  'controllers/todos_controller'
  'views/layout'
  'routes'
], (Chaplin, Todos, HeaderController, FooterController, TodosController, Layout, routes) ->
  'use strict'
  
  # The application object
  # Choose a meaningful name for your application
  class Application extends Chaplin.Application
  
    constructor: (@root) ->

    # Set your application name here so the document title is set to
    # “Controller title – Site title” (see Layout#adjustTitle)
    title: ' • TodoMVC'

    initialize: ->
      super
      #console.debug 'HelloWorldApplication#initialize'

      # Initialize core components
      @initDispatcher()
      @initLayout()
      @initMediator()

      # Application-specific scaffold
      @initControllers()

      # Register all routes and start routing
      @initRouter routes, pushState: yes, root: @root
      # You might pass Router/History options as the second parameter.
      # Chaplin enables pushState per default and Backbone uses / as
      # the root per default. You might change that in the options
      # if necessary:
      # @initRouter routes, pushState: false, root: '/subdir/'

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
      # Create a user property
      Chaplin.mediator.user = null
      # Add additional application-specific properties and methods
      Chaplin.mediator.todos = new Todos()
      # Seal the mediator
      Chaplin.mediator.seal()
