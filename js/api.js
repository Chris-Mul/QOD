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
              
                  console.log(quoteSource);
                    //update the quote content and name of the quoted peson
                    //maybe use appemnd
                    $('.entry-content').html(content);
                    $('.entry-meta').html('<p>— ' + author + ',</p>');
                    $('.entry-meta').append('<span class="source"><a class="sourceUrl" href="' + quoteSourceUrl + '"> ' + quoteSource + '</a></span>');
                    
                    

                    //display quote source if available

                    //update the URL using history

                });

        })       //make the back and forward nav work with the history API

    
        /* Ajax-based front-end post submissions */
        $(function() {
            $('#quote-submission-form').on('submit', function(event) {   
            event.preventDefault();
            const data = {
                title: $('#quote-author').val(),
                content: $('#quote-content').val(),
                _qod_quote_source: $('#quote-source').val(),
                _qod_quote_source_url: $('#quote-source-url').val(),
                post_status: 'pending'
              };
           
                $.ajax({
                    method: 'POST',
                    url: api_vars.root_url + 'wp/v2/posts',
                    data: data,
                    beforeSend: function(xhr) {
                        xhr.setRequestHeader( 'X-WP-Nonce', api_vars.nonce );
                    }
    
                }).done(function() {

                    $('#quote-submission-form').slideUp().find('textarea, input[type="submit"], input[type="text"]').val('');
                    $('.success-msg').text(api_vars.success);
                  
                    // clear the form fields and hide the form
                    //Use jquey so hide the form in a slidey way
    
                    //show success message using the var from functions.php
    
    
                }).fail(function() {
                    $('.sorry-msg').text(api_vars.failure);
                    // post and alert wih failure var from functions.php
                })
            });
        });
    
    })(jQuery);


    // $('.entry-content').html(content);

    // $('.entry-meta').html('<p>— ' + author + ',</p>');
    // $('.entry-meta').append('<span class="source"><a class="sourceUrl" href="' + quoteSourceUrl + '"> ' + quoteSource + '</a></span>');