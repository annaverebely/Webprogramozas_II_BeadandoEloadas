// Lábléc a React (Starter Kit) oldalakra: a feladat szerint minden oldal alján
// szerepelnie kell a készítők nevének és Neptun-kódjának – ugyanaz a szöveg, mint a
// Blade-oldalak footer.blade.php fájljában.
export function AppFooter() {
    return (
        <footer className="mt-auto w-full py-4 text-center text-sm text-muted-foreground">
            Készítette: Molnár Emese (CN642U) és Verebély Annamária (JA67IY)
            <br />
            <a href="/" className="underline underline-offset-4 hover:text-foreground">
                Vissza az Édes Cukrászda főoldalára
            </a>
        </footer>
    );
}
