$(document).ready(function() {
  let msgdiv = $(".msg");

  setInterval(() => {
    $.ajax({
      url: "readMsg.php",
      success: function(data) 
      {
        msgdiv.html(data);
      },
      error: function(xhr, status, error) {
        console.error(status, error);
      }
    });
  }, 500);

  $(window).keydown(function(e) 
  {
    if (e.key == "Enter") 
    {
      update();
    }
  });

  function update() 
  {
    let msg = $("#input_msg").val();
    $("#input_msg").val("");
    
    $.ajax({
      url: `addMsg.php?msg=${msg}`,
      success: function(data) 
      {
        console.log("Message has been added");
        msgdiv.scrollTop(msgdiv.prop("scrollHeight") - msgdiv.height());
      },
      error: function(xhr, status, error) 
      {
        console.error(status, error);
      }
    });
  }
  console.log('err0r');
});
