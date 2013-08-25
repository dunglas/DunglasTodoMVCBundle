# This file is part of the DunglasTodoMVCBundle package.
#
# (c) Kévin Dunglas <dunglas@gmail.com>
#
# For the full copyright and license information, please view the LICENSE
# file that was distributed with this source code.

define [
  'underscore'
  'lib/utils'
  'chaplin'
], (_, utils, Chaplin) ->
  'use strict'
  
  # Application-specific feature detection
  # --------------------------------------

  # Delegate to Chaplin’s support module
  support = utils.beget Chaplin.support

  # Add additional application-specific properties and methods

  # _(support).extend
  #   someProperty: 'foo'
  #   someMethod: ->

  support
