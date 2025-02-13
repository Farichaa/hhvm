<?hh
<<__EntryPoint>> function main(): void {
$char_variation = vec[ 'a', "a", 67, -67, 99 ];

/* creating dumping file */
$data_file = sys_get_temp_dir().'/'.'fprintf_variation_004.phpt.txt';
if (!($fp = fopen($data_file, 'wt')))
   return;

/* char type variations */
fprintf($fp, "\n*** Testing fprintf() for chars ***\n");
foreach( $char_variation as $char ) {
  fprintf( $fp, "\n");
  fprintf( $fp,"%c", $char );
}

fclose($fp);

print_r(file_get_contents($data_file));
echo "\nDone";

unlink($data_file);
}
