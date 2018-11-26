(function($){
     /* Ajax based random post fetching. */
     
        //fetch a new quote
       

        $('body').on('click', '.new-quote-button', function(event){
                event.preventDefault();

            

            $.ajax({
                method:'GET',
                url:api_vars.root_url +
                'wp/v2/posts?filter[orderby]=rand&filter[posts_per_page]=1',
                cache:false         
                }).done(function(data){
                    
                    //get the first and only post array
                    const post = data.shift(),
                    author = post.title.rendered,
                    content = post.content.rendered,
                    quoteSource = post._qod_quote_source,
                    quoteSourceUrl = post._qod_quote_source_url;
              
                  //console.log(quoteSource);
                    //update the quote content and name of the quoted peson
                    //maybe use appemnd
                    
                    $('.entry-content').html(content);
                    $('.entry-meta').html('<p>' + author + '</p>');
                    $('.source').html('<a class="sourceUrl" href="' + quoteSourceUrl + '">' + quoteSource + '</a>');
                    

                    //display quote source if available

                    //update the URL using history

                });

        })       //make the back and forward nav work with the history API


  

    /*Ajax-based front-end post submission*/
    // $(function(){

    //     $({
    //         method: 'POST',
    //         url: api_vars.root_url + 'wp/v2/posts',
    //         data,
    //         beforeSend:{
    //              // ge the code to add a nonce from the documentation,
    //         }
    //     }).done(function(){
    //             //clear the form fields and hide the form
    //             //use jquery to hide the form in a slidey way

    //             //show success message using the var from functions.php




    //     }).fail(function(){
    //         //post an alert with failure var from functions.php



    //     })


    // });






})(jQuery);