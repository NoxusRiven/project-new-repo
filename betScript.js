$(document).ready(function() 
{
    $(".button-bet1").on("click", function(event) 
    {
        const button = $(this);
        const betDiv = button.closest('.bet');
        const glos = betDiv.find(".liczbaGlosow1");
        const id = glos.data("id");
        let liczbaGlosow = parseInt(glos.text());

        $.post("vote.php", { button: 'button1', id: id, liczbaGlosow: liczbaGlosow }, function(data)
        {
            if(liczbaGlosow!=parseInt(data))
            {
                glos.text(data);
            }
            else
            {
                alert("Już głosowałeś");
            }
        });
    });

    $(".button-bet2").on("click", function(event) 
    {
        const button = $(this);
        const betDiv = button.closest('.bet');
        const glos = betDiv.find(".liczbaGlosow2");
        const id = glos.data("id");
        let liczbaGlosow = parseInt(glos.text());
        
        $.post("vote.php", { button: 'button2', id: id, liczbaGlosow: liczbaGlosow }, function(data)
        {
            if(liczbaGlosow!=parseInt(data))
            {
                glos.text(data);
            }
            else
            {
                alert("Już głosowałeś");
            }
        });
    });
});
