<?hh

<<__EntryPoint>>
function entrypoint_curl_multi_getcontent_error3(): void {
      //CURL_MULTI_GETCONTENT TEST

      //CREATE RESOURCES
       $ch1=curl_init();
      $ch2=curl_init();

      //SET URL AND OTHER OPTIONS
      curl_setopt($ch1, CURLOPT_URL, "file://".dirname(__FILE__). DIRECTORY_SEPARATOR . "curl_testdata1.txt");
      curl_setopt($ch2, CURLOPT_URL, "file://".dirname(__FILE__). DIRECTORY_SEPARATOR . "curl_testdata2.txt");
      curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);

      //CREATE MULTIPLE CURL HANDLE
      $mh=curl_multi_init();

      //ADD THE 2 HANDLES
      curl_multi_add_handle($mh,$ch1);
      curl_multi_add_handle($mh,$ch2);

      //EXECUTE
      $running=0;
      do {
          curl_multi_exec($mh, inout $running);
      } while ($running>0);

      $results2=curl_multi_getcontent($ch2);

      //CLOSE
       //curl_multi_remove_handle($mh,$ch1);
      curl_multi_remove_handle($mh,$ch2);
      curl_multi_close($mh);

      echo $results2;
}
