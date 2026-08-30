#!/usr/bin/env bash
set -euo pipefail

# Memperbarui demo statis GitHub Pages dari aplikasi Laravel yang berjalan.
# Prasyarat: composer & npm dependencies terpasang, DB ter-migrate + ter-seed,
# server dapat berjalan. Berkas demo disalin ke $SNAP_DIR lalu siap di-deploy
# ke branch gh-pages (lihat panduan cetakan di akhir).
#
# Catatan: GitHub Pages tidak menjalankan PHP/Laravel, jadi demo adalah
# snapshot halaman statis (form kontak menjadi read-only di demo, /admin
# tidak tersedia).

APP_DIR="$(cd -- "$(dirname -- "${BASH_SOURCE[0]}")/.." && pwd)"
SNAP_DIR="${SNAP_DIR:-/tmp/gbi-demo-snapshot}"
PORT="${PORT:-8123}"
BASE="http://127.0.0.1:${PORT}"

cd "$APP_DIR"

npm run build >/dev/null
mkdir -p public
ln -sfn ../storage/app/public public/storage 2>/dev/null || true

if ! curl -fsS -o /dev/null "$BASE/"; then
  php artisan serve --host=127.0.0.1 --port="$PORT" >/tmp/gbi-demo-serve.log 2>&1 &
  SERVER_PID=$!
  trap 'kill "$SERVER_PID" 2>/dev/null || true' EXIT
  for _ in $(seq 1 40); do
    curl -fsS -o /dev/null "$BASE/" && break
    sleep 1
  done
fi

rm -rf "$SNAP_DIR"
wget --mirror --convert-links --adjust-extension --page-requisites --no-parent \
  --exclude-directories=/admin -e robots=off \
  --directory-prefix="$SNAP_DIR" --no-host-directories --level=5 --no-verbose \
  "$BASE/"

rm -rf "$SNAP_DIR/build" "$SNAP_DIR/images"
cp -r public/build public/images "$SNAP_DIR/"
cp public/robots.txt public/sitemap.xml public/site.webmanifest "$SNAP_DIR/" 2>/dev/null || true
touch "$SNAP_DIR/.nojekyll"
mkdir -p "$SNAP_DIR/.github/workflows"
cp .github/workflows/pages.yml "$SNAP_DIR/.github/workflows/pages.yml"

cat <<EOF

Snapshot demo siap di: $SNAP_DIR
Deploy ke GitHub Pages:
  git checkout gh-pages
  rsync -a --delete "$SNAP_DIR/" ./
  git add . && git commit -m "Update demo website"
  git push origin gh-pages
  git checkout main
EOF