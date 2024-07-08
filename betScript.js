$(document).ready(function() 
{
    
        $(".bet").each(function() 
        {
            const betDiv = $(this);
            const id = betDiv.attr('data-idGlosowania');
            //const glosowalNa = betDiv.attr("glosowalNa");


            $.post("removeButtons.php", {idGlosowania: id}, function(data) 
            {
                if (data !== "false") 
                {
                    betDiv.find('.buttonDiv').remove();
                    betDiv.append('<p>Już głosowałeś na '+data+'</p>');
                }
            });
        });

        $(".button-bet1").on("click", function(event) 
        {
            const button = $(this);
            const betDiv = button.closest('.bet');
            const glos = betDiv.find(".liczbaGlosow1");
            const id = glos.data("id");
            const glosowalNa = glos.attr("glosowalNa");
            let liczbaGlosow = parseInt(glos.text());
    
            $.post("vote.php", { button: 'button1', id: id, liczbaGlosow: liczbaGlosow, glosowalNa: glosowalNa }, function(data)
            {
                if(liczbaGlosow!=parseInt(data))
                {
                    glos.text(data);
                    betDiv.find('.buttonDiv').remove();
                    betDiv.append('<p>Już głosowałeś na '+ glosowalNa +'</p>');
                }
                
            });
        });
    
        $(".button-bet2").on("click", function(event) 
        {
            const button = $(this);
            const betDiv = button.closest('.bet');
            const glos = betDiv.find(".liczbaGlosow2");
            const id = glos.data("id");
            const glosowalNa = glos.attr("glosowalNa");
            let liczbaGlosow = parseInt(glos.text());
            
            $.post("vote.php", { button: 'button2', id: id, liczbaGlosow: liczbaGlosow, glosowalNa: glosowalNa }, function(data)
            {
                if(liczbaGlosow!=parseInt(data))
                {
                    glos.text(data);
                    betDiv.find('.buttonDiv').remove();
                    betDiv.append('<p>Już głosowałeś na ' + glosowalNa + '</p>');
                }
                
            });
        });
    
});

