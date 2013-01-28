define [
  'views/base/collection_view',
  'views/todo_view'
], (CollectionView, TodoView) ->
  'use strict'

  class TodosView extends CollectionView
    el: '#main'
    listSelector: '#todo-list'
    itemView: TodoView
  
    initialize: ->
      super
      @subscribeEvent 'todos:clear', @clear
      @listenTo @collection, 'all', @renderCheckbox
      @delegate 'click', '#toggle-all', @toggleCompleted

    render: =>
      super
      @renderCheckbox()

    renderCheckbox: =>
      @$('#toggle-all').prop 'checked', @collection.allAreCompleted()
      @$el.toggle(@collection.length isnt 0)

    toggleCompleted: (event) =>
      isChecked = event.currentTarget.checked
      @collection.each (todo) -> todo.save completed: isChecked

    clear: ->
      @collection.getCompleted().forEach (model) ->
        model.destroy()