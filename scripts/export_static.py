"""
Static Site Exporter for Portfolio
Exports Laravel rendered views to a self-contained static site in `docs/`
Compatible with both Vercel and GitHub Pages.
"""

import os
import re
import shutil
import urllib.request

BASE_DIR = os.path.dirname(os.path.dirname(os.path.abspath(__file__)))
DOCS_DIR = os.path.join(BASE_DIR, "docs")
PUBLIC_DIR = os.path.join(BASE_DIR, "public")

print(f"[EXPORT] Base directory: {BASE_DIR}")
print(f"[EXPORT] Docs output: {DOCS_DIR}")

# 1. Ensure docs directory is clean
if os.path.exists(DOCS_DIR):
    shutil.rmtree(DOCS_DIR)
os.makedirs(DOCS_DIR, exist_ok=True)

# 2. Fetch rendered HTML from local Laravel dev server
URL = "http://127.0.0.1:8000/"
print(f"[EXPORT] Fetching HTML from {URL}...")
req = urllib.request.Request(URL, headers={"User-Agent": "StaticExporter/1.0"})
with urllib.request.urlopen(req) as resp:
    html = resp.read().decode("utf-8")

print(f"[EXPORT] Fetched {len(html)} bytes")

# 3. Replace absolute local URLs with clean relative paths
# e.g. http://127.0.0.1:8000/build/ -> ./build/
# e.g. http://127.0.0.1:8000/images/ -> ./images/
# e.g. /images/ -> ./images/
html = re.sub(r'http://127\.0\.0\.1:8000/build/', './build/', html)
html = re.sub(r'http://localhost:8000/build/', './build/', html)
html = re.sub(r'http://127\.0\.0\.1:8000/images/', './images/', html)
html = re.sub(r'http://localhost:8000/images/', './images/', html)
html = re.sub(r'(["\'])/images/', r'\1./images/', html)
html = re.sub(r'http://127\.0\.0\.1:8000/?', './', html)
html = re.sub(r'http://localhost:8000/?', './', html)

# 4. Write docs/index.html
index_html_path = os.path.join(DOCS_DIR, "index.html")
with open(index_html_path, "w", encoding="utf-8") as f:
    f.write(html)
print(f"[EXPORT] Wrote {index_html_path} ({len(html)} bytes)")

# 5. Copy public/build into docs/build
build_src = os.path.join(PUBLIC_DIR, "build")
build_dst = os.path.join(DOCS_DIR, "build")
if os.path.exists(build_src):
    shutil.copytree(build_src, build_dst)
    print(f"[EXPORT] Copied build assets to {build_dst}")

# 6. Copy public/images into docs/images
images_src = os.path.join(PUBLIC_DIR, "images")
images_dst = os.path.join(DOCS_DIR, "images")
if os.path.exists(images_src):
    shutil.copytree(images_src, images_dst)
    print(f"[EXPORT] Copied images to {images_dst}")

# 7. Copy favicon if exists
favicon_src = os.path.join(PUBLIC_DIR, "favicon.ico")
favicon_dst = os.path.join(DOCS_DIR, "favicon.ico")
if os.path.exists(favicon_src):
    shutil.copy(favicon_src, favicon_dst)
    print(f"[EXPORT] Copied favicon to {favicon_dst}")

# 8. Create .nojekyll for GitHub Pages
nojekyll_path = os.path.join(DOCS_DIR, ".nojekyll")
with open(nojekyll_path, "w") as f:
    pass
print(f"[EXPORT] Created .nojekyll for GitHub Pages compatibility")

print("\n[SUCCESS] Static export completed successfully!")
