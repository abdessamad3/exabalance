    </main>
</body>
<script>
$(document).ready(function (){
      fetchPess();
    });
    function fetchPess() {
    fetch('/exabalance/models/get_pesse.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded',
      },
      body: 'request=data'
    })
    .then(response => {
      if (!response.ok) {
        alert('Fetch failed: ' + response.statusText);
        throw new Error('Network response was not ok');
      }
      return response.text();
    })
    .then(data => {
      if (data && data.trim() !== '') {
        if ($('#poidsBrut').length) {
          document.getElementById('poidsBrut').value = data;
        }
        if($('#main_pesse').length){
          document.getElementById('main_pesse').innerHTML = data;
        }
      } else {
        alert('No data received');
      }
    })
  }
   var timer = 0;
   function set_interval() {
     timer = setInterval("auto_logout()", 36000000);
   }
   function reset_interval(){
    if(timer != 0){
      clearInterval(timer);
      timer = 0;
      timer = setInterval("auto_logout()", 36000000);
    }
   }
   function auto_logout() {
      window.location.href = '.?action=logout';
   }
</script>
</html>