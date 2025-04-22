param (
    [string]$Path = ".",
    [string[]]$Exclude = @("node_modules", "vendor", "public", "storage", "bootstrap", "tests", ".git", ".editorconfig", ".env.example", ".gitattributes", ".gitignore", "styleci.yml", "composer.lock", "package-lock.json", "package.json", "ISSUE_TEMPLATE.md", "README.md", "README2.md", "project_structure.txt", "composer.phar", "phpunit.xml", "webpack.mix.js")
)

function Show-Tree {
    param (
        [string]$Path,
        [string[]]$Exclude,
        [string]$Indent = "",
        [bool]$IsLast = $true
    )

    # Mendapatkan item di direktori, mengecualikan folder/file yang tidak penting
    $items = Get-ChildItem -Path $Path -ErrorAction SilentlyContinue | Where-Object {
        $_.Name -notin $Exclude
    }

    $count = $items.Count
    $index = 0

    foreach ($item in $items) {
        $index++
        $isLastItem = $index -eq $count
        $prefix = if ($IsLast) { "    " } else { "|   " }
        $marker = if ($isLastItem) { "\---" } else { "+---" }

        Write-Output "$Indent$marker$($item.Name)"

        if ($item.PSIsContainer) {
            $newIndent = $Indent + $prefix
            Show-Tree -Path $item.FullName -Exclude $Exclude -Indent $newIndent -IsLast $isLastItem
        }
    }
}

Write-Output "Laravel Project Tree (Penting Saja)"
Write-Output "==================="
Show-Tree -Path $Path -Exclude $Exclude