function toggleContent(id) 
        {
            const content = document.getElementById('post-'+id);
            if (content.style.display === 'none') 
            {
                content.style.display = 'block';
            } 
            else 
            {
                content.style.display = 'none';
            }
        }

        function toggleComments(id) 
        {
            const content = document.getElementById('comment-'+id);
            if (content.style.display === 'none') 
            {
                content.style.display = 'block';
            } 
            else 
            {
                content.style.display = 'none';
            }
        }