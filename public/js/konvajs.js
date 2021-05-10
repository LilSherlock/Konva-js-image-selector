
    TouchEmulator();

    // ------------------------------ Variables ------------------------------------------------------------------
    TouchEmulator.multiTouchOffset = 80;
    TouchEmulator.template = Function(TouchEmulator);
    Konva.hitOnDragEnabled = true;
    Konva.captureTouchEventsEnabled = true;
    var state = [];

    // our history
    var appHistory = [state];

    var width = this.container.offsetWidth;
    var height = this.dick.offsetHeight;

    let currentShape;
    var menuNode = document.getElementById('menu');

    function createObject(attrs) {


        return Object.assign({}, attrs, {
            // define position
            x: 200,
            y: 200,
            draggable: true,
            rotation: 0,
            scaleX: 0.5,
            stroke: 'black',
            strokeWidth: 10,
            scaleY: 0.5,
            // here should be url to image
            // and define filter on it, let's define that we can have only
            // "blur", "invert" or "" (none)
        });
    }

    function createYoda(attrs) {
        return Object.assign(createObject(attrs), {
            src: '../asset/logo.png',
        });
    }

      // initial state


    var stage = new Konva.Stage({
        container: 'container',
        width: width,
        height: height,
    });

    var layer = new Konva.Layer();
    stage.add(layer);

      // create function will destroy previous drawing
      // then it will created required nodes and attach all events
    var size = 400

    function create() {
        layer.destroyChildren();

        state.forEach((item, index) => {
            var node = new Konva.Image({
                width: size,
                height: size,

                name: 'item-' + index,
                offsetX: size / 2,
                offsetY: size / 2,
                scaleX: 0.5,
                scaleY: 0.5,
            });

            layer.add(node);
            var hammertime = new Hammer(node, { domEvents: true });

            hammertime.get('rotate').set({ enable: true });

            var oldRotation = 0;
            var startScale = 0;

            node.on('rotatestart', function (ev) {
                console.log(node.attrs.draggable);
                if (node.attrs.draggable === false) {
                    console.log('aa');
                    return;
                }
                oldRotation = ev.evt.gesture.rotation;
                startScale = node.scaleX();
                node.stopDrag();
                node.draggable(false);
                stage.draggable(false);
            });

            node.on('rotate', function (ev) {
                if (0 === ev.evt.gesture.rotation) {
                    return;
                }
                var delta = oldRotation - ev.evt.gesture.rotation;
                node.rotate(-delta);
                oldRotation = ev.evt.gesture.rotation;
                node.scaleX(startScale * ev.evt.gesture.scale);
                node.scaleY(startScale * ev.evt.gesture.scale);

                // make new state
                layer.batchDraw();
            });
            node.on('rotateend rotatecancel', function (ev) {
                stage.draggable(true);
                node.draggable(true);
                state = state.slice();
                // update object data
                state[index] = Object.assign({}, state[index], {
                    rotation: node.rotation(),
                    scaleX: node.scaleX(),
                    scaleY: node.scaleY(),
                });
                // save it into history
                saveStateToHistory(state);
                layer.batchDraw();
            });
            node.on('dragend', () => {
                // make new state
                state = state.slice();
                // update object data
                state[index] = Object.assign({}, state[index], {
                    x: node.x(),
                    y: node.y(),
                });
                // save it into history
                saveStateToHistory(state);
                // don't need to call update here
                // because changes already in node
            });

            node.on('press', function (ev) {


                if (node.attrs.draggable) {
                    node.stopDrag();
                }

                ev.evt.preventDefault();
                if (ev.target === stage) {
                  // if we are on empty place of the stage we will do nothing
                  return;
                }
                currentShape = ev.target;
                menuNode.style.display = 'initial';
                var containerRect = stage.container().getBoundingClientRect();
                menuNode.style.top =
                  containerRect.top + stage.getPointerPosition().y + 4 + 'px';
                menuNode.style.left =
                  containerRect.left + stage.getPointerPosition().x + 4 + 'px';
            });

            node.on('touchstart', function (ev) {
                menuNode.style.display = 'none';
            });

            var img = new window.Image();
            img.onload = function () {
                node.image(img);
                update(state);
                layer.batchDraw();
            };
            img.src = item.src;
        });
        update(state);
    }

      function update() {
        state.forEach(function (item, index) {

          var node = stage.findOne('.item-' + index);
          node.setAttrs({
            x: item.x,
            y: item.y,
            scaleX: item.scaleX,
            scaleY: item.scaleY,
            rotation: item.rotation,
            draggable: item.draggable,
          });

          if (!node.image()) {
            return;
          }
        });
        layer.batchDraw();
      }

      //
      appHistoryStep = 0;

      function saveStateToHistory(state) {
        appHistory = appHistory.slice(0, appHistoryStep + 1);
        appHistory = appHistory.concat([state]);
        appHistoryStep += 1;
      }

      create(state);

      document
        .querySelector('#create-yoda')
        .addEventListener('click', function () {
          // create new object
          state.push(
            createYoda({
              x: width * Math.random(),
              y: height * Math.random(),
            })
          );
          // recreate canvas
          create(state);
        });

      document
        .querySelector('#create-darth')
        .addEventListener('click', function () {
          // create new object
          state.push(
            createDarth({
              x: width * Math.random(),
              y: height * Math.random(),
            })
          );
          // recreate canvas
          create(state);
        });

    document.querySelector('#undo').addEventListener('click', function () {
        console.log(state);
        console.log(appHistoryStep);
        console.log(appHistory);
        if (appHistoryStep === 0) {
            return;
        }
        if(state === undefined) {
            return
        }
        if (state.length == 0) {
            return;
        }
        if (appHistoryStep.length == 0) {
            return;
        }
        appHistoryStep -= 1;
        state = appHistory[appHistoryStep];
        // create everything from scratch
        create(state);
    });

    document.querySelector('#redo').addEventListener('click', function () {
        console.log(state);
        console.log(appHistoryStep);
        console.log(appHistory);
        if (appHistoryStep === appHistory.length - 1) {
            return;
        }
        if(state === undefined) {
            return
        }
        if (state.length == 0) {
            return;
        }
        if (appHistoryStep.length == 0) {
            return;
        }
        appHistoryStep += 1;
        state = appHistory[appHistoryStep];
        // create everything from scratch
        create(state);
    });


    document.getElementById('pulse-button').addEventListener('click', () => {
        menuNode.style.display = 'none';
        var key = currentShape.attrs.name;
        key = key.substring(5);
        console.log(key);
        console.log(currentShape.attrs);
        console.log(state[key].draggable);
        if (currentShape.attrs.draggable == true) {
            currentShape.to({
                draggable: false,
            });
            state[key].draggable = false;

        } else {

            currentShape.to({
                draggable: true,
            });
            state[key].draggable = true;
        }
    });

    document.getElementById('delete-button').addEventListener('click', () => {
        menuNode.style.display = 'none';
        currentShape.destroy();
        var key = currentShape.attrs.name;
        key = key.substring(5);
        console.log(key);
        state.splice(parseInt(key), 1);
        layer.draw();
    });


    stage.on('contextmenu', function (e) {
      // prevent default behavior
      e.evt.preventDefault();
      if (e.target === stage) {
        // if we are on empty place of the stage we will do nothing
        return;
      }
      currentShape = e.target;
      // show menu
      menuNode.style.display = 'initial';
      var containerRect = stage.container().getBoundingClientRect();
      menuNode.style.top =
        containerRect.top + stage.getPointerPosition().y + 4 + 'px';
      menuNode.style.left =
        containerRect.left + stage.getPointerPosition().x + 4 + 'px';
    });
