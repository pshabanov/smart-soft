export interface MenuElement {
    label: string
    icon?: string
    path?: string
    href?: string
    target?: string
    child: MenuElement[]
}
