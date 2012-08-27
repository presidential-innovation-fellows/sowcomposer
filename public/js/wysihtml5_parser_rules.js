var wysihtml5ParserRules = {
  tags: {
    strong: {},
    b:      {},
    i:      {},
    em:     {},
    br:     {},
    p:      {},
    div:    {},
    span:   {},
    ul:     {},
    ol:     {},
    li:     {},
    h3:     {},
    h4:     {},
    table:  {
      set_attributes: {
        class: "table"
      }
    },
    thead:  {},
    tbody:  {},
    tr:     {},
    td:     {},
    th:     {},
    a:      {
      set_attributes: {
        target: "_blank",
        rel:    "nofollow"
      },
      check_attributes: {
        href:   "url" // important to avoid XSS
      }
    }
  }
};
