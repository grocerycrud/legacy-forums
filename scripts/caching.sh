CACHE_DIR="writable/cache/webpages"
echo "Remove $CACHE_DIR safely and create a new empty folder..."
# Checking if the folder that we are about to remove actually exist!
if [ -d $CACHE_DIR ]
then
  echo ""
  echo "Moving $CACHE_DIR to writable/cache/webpages_bak first for fast removal..."
  mv $CACHE_DIR writable/cache/webpages_bak
  mkdir $CACHE_DIR
  chmod 766 $CACHE_DIR
  rm -rf writable/cache/webpages_bak
else
  echo ""
  echo "$CACHE_DIR doesn't exist so creating a new one!"
  mkdir $CACHE_DIR
  chmod 766 $CACHE_DIR
fi

echo ""

echo "Done!"
echo ""