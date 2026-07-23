Pheditor
=======

Pheditor is a single-file editor and file manager written in PHP.

![Pheditor - PHP file Editor](https://pheditor.ir/assets/image/screenrecord-desktop.gif "Pheditor PHP file editor")

### Features
1. Editor with syntax highlighting
2. File Manager (create, rename and delete files and directories)
3. Password protected area
4. Keeping the history of edited files and changes
5. Keyboard shortcuts
6. Access levels for reading and writing and other permissions
7. Terminal
8. Dark mode
9. Search in files

---

### Requirements

1. Web server (Nginx, Apache, or etc)
2. PHP 8.3 or above

---

### Install & Usage

Install using composer:
`composer create-project pheditor/pheditor`

or just upload `pheditor.php` to your web host (and/or rename it as you wish).

**⚠️ Immediately after installing, change the default password (see NOTES below) before using any other feature.**

---

### Local assets

By default Pheditor uses CDN to load required libraries but also it is possible to load assets from local directory.

For using local assets follow these steps:

1. Edit `pheditor.php` and change `LOCAL_ASSETS` definition to `true`.

`define('LOCAL_ASSETS', true);`

2. Run `npm i` to install required dependencies.

---

## Security Model

Pheditor is a **single-admin tool**, conceptually similar to a local code editor (e.g. VSCode) exposed over HTTP for remote convenience. It intentionally allows creating, editing, and uploading files of any type — **including `.php` files** — because that is the core purpose of a code/file editor. This is a deliberate design decision, not an oversight: a file editor that couldn't edit or upload PHP files would not be useful for editing PHP projects.

Because of this, **Pheditor should be treated as equivalent in sensitivity to direct SSH/FTP access to your server**, and must never be exposed without proper protection. Specifically:

1. **Change the default password immediately.** The default password (`admin`) is public knowledge (it's in this README and the source code). An instance left with the default password is equivalent to having no authentication at all.
2. **Restrict access by IP** using the `ACCESS_IP` setting whenever possible, especially if the server has a static IP or VPN.
3. **Do not expose Pheditor on a public/guessable URL** without additional protection — consider putting it behind HTTP Basic Auth at the web-server level, a VPN, or an SSH tunnel, in addition to Pheditor's own password.
4. **Limit `PERMISSIONS`** to only what you actually need. If you don't need the terminal or upload features, remove `terminal` and `uploadfile` from the `PERMISSIONS` constant.
5. **Treat any leaked password as a full server compromise**, not just "editor access" — because file edit + terminal access together are equivalent to shell access.

If you are looking for a tool to expose to untrusted or semi-trusted users, Pheditor is **not** the right tool — it is built for a single trusted administrator only.

---

**NOTES**:
1. **The default password is `admin`.** This is publicly known and provides no real protection on its own — you must change it before or immediately after first login. Pheditor will prompt you to change it on first use, but the prompt alone does not protect the instance until the password is actually changed.
2. Since Pheditor grants full read/write access to files (including PHP files) and, optionally, terminal access, treat the URL and password with the same care you would give to an SSH credential. See [Security Model](#security-model) above for recommended hardening steps.

---

**Optional settings:**

The settings would be editable in the main PHP file (pheditor.php by default).
The settings are as below:
1. Define patterns for files and directories to view/edit (empty means all files & directories)
2. Log file path
3. Show/Hide hidden files
4. Limit access to the page only for an IP address (empty means access for all)
5. Show/Hide main pheditor file (pheditor.php) in files list to edit 
6. History files path
7. Word wrap
8. Changing main directory (`MAIN_DIR`)
9. Enable/Disable Terminal
10. Define allowed terminal commands
11. Change editor theme (`EDITOR_THEME`) ([theme list](https://codemirror.net/demo/theme.html))
12. New file and directory permissions (`DEFAULT_DIR_PERMISSION` and `DEFAULT_FILE_PERMISSION`)

---

**Using without password:**

You can empty the `PASSWORD` constant in the source code to access the script without the password. **This is strongly discouraged** and should only be used in a fully trusted, isolated environment (e.g. localhost-only, behind a VPN with its own authentication) — never on a publicly reachable host.

---

**Access Levels and Permissions:**

There are eight permissions for users that is defined in `PERMISSIONS` constant. You can remove any of them as you need.

Default value: `newfile,newdir,editfile,deletefile,deletedir,renamefile,renamedir,changepassword,uploadfile,terminal,movefile`

If you're unsure which permissions to enable, start with a minimal set and add more only as needed — especially for `terminal` and `uploadfile`, which grant the most powerful capabilities.

---
**Thanks to:**

[Laurent](https://github.com/slolo2000), [fjavierc](https://github.com/fjavierc), [Jidbo](https://github.com/Jidbo)
