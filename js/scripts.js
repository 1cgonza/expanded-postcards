jQuery(document).ready(function($) {
  var vortex = $('#gallery div');
  var container;
  var camera, scene, renderer, controls;
  var postcards = [];
  init();
  animate();

  function init() {
    // camera
    camera = new THREE.PerspectiveCamera( 60, window.innerWidth / window.innerHeight, 1, 1000 );
    camera.position.z = 1000;
    scene = new THREE.Scene();

    for ( var i = 0; i < vortex.length; i ++ ) {
      var postcard = vortex [i];
      var object = new THREE.CSS3DObject( postcard );
      object.position.x = Math.random() * 4000 - 2000;
      object.position.y = Math.random() * 4000 - 2000;
      object.position.z = Math.random() * 4000 - 2000;
      scene.add( object );
      postcards.push( object );
    }

    renderer = new THREE.CSS3DRenderer();
    renderer.setSize( window.innerWidth, window.innerHeight );
    renderer.domElement.style.position = 'absolute';
    document.getElementById('container').appendChild(renderer.domElement);

    controls = new THREE.TrackballControls(camera, renderer.domElement);
    controls.rotateSpeed = 0.8;
    controls.addEventListener('change', render);
  }

  function onWindowResize() {
    camera.aspect = window.innerWidth / window.innerHeight;
    camera.updateProjectionMatrix();
    renderer.setSize(window.innerWidth, window.innerHeight);
  }

  function animate() {
    requestAnimationFrame( animate );
    TWEEN.update();
    controls.update();
  }

  function render() {
    renderer.render( scene, camera );
  }

  // Captions hover
  $('.postcard').hover(
    function() {
      $(this).children('.caption').fadeTo('fast', 1);
    },
    function() {
      $(this).children('.caption').fadeTo('', 0);
    }
  );

  // Loading post content
  $('.ajax').click(function (e) {
    e.preventDefault();

    var post_link = $(this).attr('href');
    $('#post-content').fadeIn();
    $('#post-content').addClass('loading');
    $('#post-content').load(post_link + ' .entry', function() {
      $('#post-content').removeClass('loading');

      // Click Outside lighbox to close
      $('#post-content').click(function() {
        $('.entry').remove();
        $(this).fadeOut('fast');
      });

      $('#inner-content').click(function (event) {
        event.stopPropagation();
      });

      });
  });

  window.addEventListener( 'resize', onWindowResize, false );

});