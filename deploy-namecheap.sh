#!/bin/bash
# ============================================================
#  Namecheap Deployment Packager
#  Creates a deploy-ready ZIP for uploading to public_html
# ============================================================

set -e

SCRIPT_DIR="$(cd "$(dirname "$0")" && pwd)"
cd "$SCRIPT_DIR"

DEPLOY_DIR="$SCRIPT_DIR/deploy_build"
ZIP_NAME="trigan-deploy.zip"

echo "🔧 Step 1: Building Vite assets..."
npm run build

echo "🗑️  Step 2: Cleaning old deploy build..."
rm -rf "$DEPLOY_DIR"
rm -f "$ZIP_NAME"
mkdir -p "$DEPLOY_DIR"

echo "📂 Step 3: Copying project files..."
# Copy all Laravel app files (excluding dev-only stuff)
rsync -a --progress \
    --exclude='node_modules' \
    --exclude='.git' \
    --exclude='.github' \
    --exclude='.idea' \
    --exclude='deploy_build' \
    --exclude='deploy-namecheap.sh' \
    --exclude='trigan-deploy.zip' \
    --exclude='public' \
    --exclude='.DS_Store' \
    --exclude='tests' \
    --exclude='phpunit.xml' \
    --exclude='*.log' \
    . "$DEPLOY_DIR/"

echo "📂 Step 4: Merging public/ into root..."
# Move contents of public/ to deploy root (so index.php is at root = public_html root)
cp -R public/.htaccess "$DEPLOY_DIR/.htaccess"
cp -R public/index.php "$DEPLOY_DIR/index.php"
cp -R public/robots.txt "$DEPLOY_DIR/robots.txt" 2>/dev/null || true
cp -R public/favicon.ico "$DEPLOY_DIR/favicon.ico" 2>/dev/null || true
cp -R public/build "$DEPLOY_DIR/build"

# Remove hot file if it got copied
rm -f "$DEPLOY_DIR/hot"
rm -f "$DEPLOY_DIR/public/hot"

echo "📂 Step 5: Creating storage directories..."
mkdir -p "$DEPLOY_DIR/storage/framework/sessions"
mkdir -p "$DEPLOY_DIR/storage/framework/views"
mkdir -p "$DEPLOY_DIR/storage/framework/cache/data"
mkdir -p "$DEPLOY_DIR/storage/logs"
mkdir -p "$DEPLOY_DIR/storage/app/public"

echo "🔗 Step 6: Creating storage symlink..."
# Create a relative symlink: storage -> storage/app/public
cd "$DEPLOY_DIR"
ln -sf storage/app/public storage_link
cd "$SCRIPT_DIR"

echo "📦 Step 7: Creating ZIP..."
cd "$DEPLOY_DIR"
zip -r "$SCRIPT_DIR/$ZIP_NAME" . -x "*.DS_Store"
cd "$SCRIPT_DIR"

echo "🗑️  Step 8: Cleanup..."
rm -rf "$DEPLOY_DIR"

echo ""
echo "✅ Done! Upload '$ZIP_NAME' to Namecheap."
echo ""
echo "📋 After uploading & extracting in public_html:"
echo "   1. Create/edit .env with your production values"
echo "   2. SSH in and run:"
echo "      cd ~/public_html"
echo "      php artisan config:cache"
echo "      php artisan route:cache"
echo "      php artisan view:cache"
echo "      ln -sf storage/app/public storage"
echo ""
